<?php

namespace App\Http\Controllers;

use App\BasicSetting;
use App\User;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Token;
use App\PaymentLog;
use App\PaymentMethod;
use Carbon\Carbon;
use App\TraitsFolder\CommonTrait;

class PaymentIPNController extends Controller
{
    use CommonTrait;
    public function paypalSubmit(Request $request)
    {
        $request->validate([
            'custom' => 'required'
        ]);

        $log = PaymentLog::whereOrder_number($request->custom)->firstOrFail();

        $basic = BasicSetting::first();
        $method = PaymentMethod::first();
        $apiContext = new ApiContext(new OAuthTokenCredential($method->val1, $method->val2));
        $apiContext->setConfig([
            'mode' => $method->val3,
            'http.ConnectionTimeOut' => 3000,
            'log.LongEnabled' => true,
            'log.FileName' => storage_path().'/logs/paypal.log',
            'log.LogLevel' => 'DEBUG'
        ]);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName('Plan - '.$log->user->plan->name)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($log->usd);

        $itemList = new ItemList();
        $itemList->setItems(array($item));

        $amount = new Amount();
        $amount->setTotal($log->usd);
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setCustom($request->custom)
            ->setItemList($itemList)
            ->setDescription('Subscription Charge - '.$basic->title);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal-ipn'))
            ->setCancelUrl(route('chose-payment-method'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($apiContext);
        }
        catch (PayPalConnectionException $ex) {
            session()->flash('message','Payment Not Completed');
            session()->flash('type','warning');
            return redirect()->route('chose-payment-method');
        }

        $approvalUrl = $payment->getApprovalLink();

        return redirect($approvalUrl);

    }
    public function paypalIpn(Request $request)
    {

        if (empty($request->input('PayerID')) || empty($request->input('token'))){
            session()->flash('message','Payment Not Completed');
            session()->flash('type','warning');
            return redirect()->route('chose-payment-method');
        }

        $method = PaymentMethod::first();
        $apiContext = new ApiContext(new OAuthTokenCredential($method->val1, $method->val2));
        $apiContext->setConfig([
            'mode' => $method->val3,
            'http.ConnectionTimeOut' => 3000,
            'log.LongEnabled' => true,
            'log.FileName' => storage_path().'/logs/paypal.log',
            'log.LogLevel' => 'DEBUG'
        ]);

        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        $result = $payment->execute($execution, $apiContext);
        $custom = $result->transactions[0]->custom;

        $data = PaymentLog::where('order_number' , $custom)->wherePayment_id(1)->first();

        if ($result->getState() == 'approved' and $result->transactions[0]->amount->total == $data->usd){

            $user = User::findOrFail($data->user_id);
            $plan = Plan::findOrFail($user->plan_id);

            if ($plan->plan_type == 1){
                $user->expire_time  = 1;
            }else{
                $user->expire_time  = Carbon::parse()->addDays($plan->duration);
            }

            $user->plan_status = 1;
            $user->save();

            $data->status = 1;
            $data->save();


            $this->paymentConfirm($user->id,$data->usd,$custom,"Paypal");
            session()->flash('message','Payment Successfully Completed.');
            session()->flash('type','success');
            return redirect()->route('user-dashboard');

        }else{
            session()->flash('message','Payment Not Completed');
            session()->flash('type','warning');
            return redirect()->route('chose-payment-method');
        }

    }
    public function perfectIPN()
    {
        $pay = PaymentMethod::whereId(2)->first();
        $passphrase=strtoupper(md5($pay->val2));

        define('ALTERNATE_PHRASE_HASH',  $passphrase);
        define('PATH_TO_LOG',  '/somewhere/out/of/document_root/');
        $string=
            $_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
            $_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
            $_POST['PAYMENT_BATCH_NUM'].':'.
            $_POST['PAYER_ACCOUNT'].':'.ALTERNATE_PHRASE_HASH.':'.
            $_POST['TIMESTAMPGMT'];
        $hash=strtoupper(md5($string));
        $hash2 = $_POST['V2_HASH'];
        if($hash==$hash2){

            $amo = $_POST['PAYMENT_AMOUNT'];
            $unit = $_POST['PAYMENT_UNITS'];
            $custom = $_POST['PAYMENT_ID'];
            $data = PaymentLog::where('order_number' , $custom)->wherePayment_id(2)->first();
            if($_POST['PAYEE_ACCOUNT']=="$pay->val1" && $unit=="USD" && $amo == $data->usd){

                $user = User::findOrFail($data->user_id);
                $plan = Plan::findOrFail($user->plan_id);


                if ($plan->plan_type == 1){
                    $user->expire_time  = 1;
                }else{
                    $user->expire_time  = Carbon::parse()->addDays($plan->duration);
                }

                $user->plan_status = 1;
                $user->coupon_status = 1;
                $user->save();

                $data->status = 1;
                $data->save();

                $this->paymentConfirm($user->id,$amo,$custom,"Perfect Money");
                session()->flash('message','Payment Successfully Completed.');
                session()->flash('type','success');
                return redirect()->route('chose-payment-method');

            }else{
                session()->flash('message', 'Something error In Payment');
                session()->flash('type', 'warning');
                return redirect()->route('chose-payment-method');
            }
        }
    }
    public function btcIPN(){

        $depoistTrack = $_GET['invoice_id'];
        $secret = $_GET['secret'];
        $address = $_GET['address'];
        $value = $_GET['value'];
        $confirmations = $_GET['confirmations'];
        $value_in_btc = $_GET['value'] / 100000000;
        $trx_hash = $_GET['transaction_hash'];
        $data = PaymentLog::whereOrder_number($depoistTrack)->wherePayment_id(3)->first();
        if($data->status == 0){

            if ($data->btc_amo == $value_in_btc && $data->btc_acc == $address && $secret=="bitcoin_secret" && $confirmations>2){

                $user = User::findOrFail($data->user_id);
                $plan = Plan::findOrFail($user->plan_id);


                if ($plan->plan_type == 1){
                    $user->expire_time  = 1;
                }else{
                    $user->expire_time  = Carbon::parse()->addDays($plan->duration);
                }
                $user->plan_status = 1;
                $user->coupon_status = 1;
                $user->save();

                $data->status = 1;
                $data->save();

                $this->paymentConfirm($user->id,$data->usd,$depoistTrack,"Bitcoin Payment");
                session()->flash('message','Payment Successfully Completed.');
                session()->flash('type','success');
                return redirect()->route('chose-payment-method');
            }
        }
    }
    public function submitStripe(Request $request)
    {
        $this->validate($request,[
            'amount' => 'required',
            'custom' => 'required',
            'cardNumber' => 'required|numeric',
            'cardExpiryMonth' => 'required|numeric|digits:2',
            'cardExpiryYear' => 'required|numeric|digits:4',
            'cardCVC' => 'required|numeric',
        ]);
        $data = PaymentLog::whereOrder_number($request->custom)->wherePayment_id(4)->first();
        $amm = $data->usd;
        $cc = $request->cardNumber;
        $emo = $request->cardExpiryMonth;
        $eyr = $request->cardExpiryYear;
        $cvc = $request->cardCVC;
        $basic = PaymentMethod::whereId(4)->first();
        Stripe::setApiKey($basic->val1);
        try{
            $token = Token::create(array(
                "card" => array(
                    "number" => $cc,
                    "exp_month" => $emo,
                    "exp_year" => $eyr,
                    "cvc" => $cvc
                )
            ));
            if (!isset($token['id'])) {
                session()->flash('message','Stripe Token not generated.');
                session()->flash('type','danger');
                return redirect()->route('chose-payment-method');
            }
            $charge = Charge::create(array(
                'card' => $token['id'],
                'currency' => 'USD',
                'amount' => $amm * 100,
                'description' => 'Multi item',
            ));
            if ($charge['status'] == 'succeeded' ) {

                $user = User::findOrFail($data->user_id);
                $plan = Plan::findOrFail($user->plan_id);

                if ($plan->plan_type == 1){
                    $user->expire_time  = 1;
                }else{
                    $user->expire_time  = Carbon::parse()->addDays($plan->duration);
                }
                $user->plan_status = 1;
                $user->coupon_status = 1;
                $user->save();

                $data->status = 1;
                $data->save();

                $this->paymentConfirm($user->id,$data->usd,$request->custom,"Stripe Card");
                session()->flash('message','Payment Successfully Completed.');
                session()->flash('type','success');
                return redirect()->route('chose-payment-method');
            }else{
                session()->flash('message','Something Wrong With Card.');
                session()->flash('type','warning');
                return redirect()->route('chose-payment-method');
            }

        }catch (\Exception $e){
            session()->flash('message',$e->getMessage());
            session()->flash('type','warning');
            return redirect()->route('chose-payment-method');
        }
    }
    public function skrillIPN()
    {
        $payment = PaymentMethod::whereId(5)->first();
        $concatFields = $_POST['merchant_id']
            .$_POST['transaction_id']
            .strtoupper(md5($payment->val2))
            .$_POST['mb_amount']
            .$_POST['mb_currency']
            .$_POST['status'];
        $MBEmail = $payment->val1;
        // Ensure the signature is valid, the status code == 2,
        // and that the money is going to you
        $custom = $_POST['transaction_id'];
        $data = PaymentLog::whereOrder_number($custom)->wherePayment_id(5)->first();
        if (strtoupper(md5($concatFields)) == $_POST['md5sig']
            && $_POST['status'] == 2
            && $_POST['pay_to_email'] == $MBEmail)
        {
            $user = User::findOrFail($data->user_id);
            $plan = Plan::findOrFail($user->plan_id);

            if ($plan->plan_type == 1){
                $user->expire_time  = 1;
            }else{
                $user->expire_time  = Carbon::parse()->addDays($plan->duration);
            }
            $user->plan_status = 1;
            $user->coupon_status = 1;
            $user->save();

            $data->status = 1;
            $data->save();

            $this->paymentConfirm($user->id,$data->usd,$custom,"Skrill");
            session()->flash('message','Payment Successfully Completed.');
            session()->flash('type','success');
            return redirect()->route('chose-payment-method');
        }
        else
        {
            session()->flash('message','Something Wrong With Skrill.');
            session()->flash('type','warning');
            return redirect()->route('chose-payment-method');
        }
    }

    public function coinPaymentIPN()
    {

        $basic = BasicSetting::first();

        $pay = PaymentMethod::whereId(6)->first();

        $cp_merchant_id = $pay->val2;
        $cp_ipn_secret = $pay->val2;
        $cp_debug_email = $basic->email;
        $custom = $_POST['custom'];
        $data = PaymentLog::where('order_number' ,$custom)->wherePayment_id(6)->first();

        $order_currency = 'USD';

        $order_total = $data->usd; // verify the order total

        function errorAndDie($error_msg) {
            global $cp_debug_email;
            if (!empty($cp_debug_email)) {
                $report = 'Error: '.$error_msg."\n\n";
                $report .= "POST Data\n\n";
                foreach ($_POST as $k => $v) {
                    $report .= "|$k| = |$v|\n";
                }
                mail($cp_debug_email, 'CoinPayments IPN Error', $report);
            }
            die('IPN Error: '.$error_msg);
        }

        if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') {
            die('this page is for hmac posts only');
        }

        if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
            die('No HMAC signature sent.');
        }

        $request = file_get_contents('php://input');
        if ($request === FALSE || empty($request)) {
            die('Error reading POST data');
        }

        if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($cp_merchant_id)) {
            die('No or incorrect Merchant ID passed');
        }

        $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret));
        if ($hmac != $_SERVER['HTTP_HMAC']) {
            die('HMAC signature does not match');
        }

        // hmac is valid - load variables

        $txn_id = $_POST['txn_id'];
        $item_name = $_POST['item_name'];
        $item_number = $_POST['item_number'];
        $amount1 = floatval($_POST['amount1']);
        $amount2 = floatval($_POST['amount2']);
        $currency1 = $_POST['currency1'];
        $currency2 = $_POST['currency2'];
        $status = intval($_POST['status']);
        $status_text = $_POST['status_text'];
        $username = $_SESSION['username'];

        if ($currency1 != $order_currency) {
            die('Original currency mismatch!');
        }

        if ($amount1 < $order_total) {
            die('Amount is less than order total!');
        }

        if ($status >= 100 || $status == 2) {
            // payment is complete or queued for nightly payout, success
            $user = User::findOrFail($data->user_id);
            $plan = Plan::findOrFail($user->plan_id);

            if ($plan->plan_type == 1){
                $user->expire_time  = 1;
            }else{
                $user->expire_time  = Carbon::parse()->addDays($plan->duration);
            }
            $user->plan_status = 1;
            $user->coupon_status = 1;
            $user->save();

            $data->status = 1;
            $data->save();

            $this->paymentConfirm($user->id,$data->usd,$custom,"Coin Payment");
            session()->flash('message','Payment Successfully Completed.');
            session()->flash('type','success');
            return redirect()->route('chose-payment-method');
        } else if ($status < 0) {
            //payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent
        } else {
            //payment is pending, you can optionally add a note to the order page
        }
        die('IPN OK');
    }
}

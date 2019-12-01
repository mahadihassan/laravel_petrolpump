<?php

namespace App\Http\Controllers;

use App\BasicSetting;
use App\Category;
use App\Coupon;
use App\Plan;
use App\Post;
use App\Section;
use App\Signal;
use App\SignalComment;
use App\SignalRating;
use App\StaffRequest;
use App\SubmitSignal;
use App\TraitsFolder\CommonTrait;
use App\TransactionLog;
use App\User;
use App\UserSignal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    use CommonTrait;
    public function __construct()
    {
        $this->middleware('checkInstaller');
        $this->middleware('basicView');
        $this->middleware('auth:admin');
    }

    public function getDashboard()
    {

        $data['page_title'] = "Dashboard";
        $data['signal'] = 12;
        $data['blog'] = Post::all()->count();
        $data['category'] = Category::all()->count();
        $data['user'] = User::all()->count();

        $start = Carbon::parse()->subDays(19);
        $end = Carbon::now();
        $stack = [];
        $date = $start;
        while ($date <= $end) {
            $stack[] = $date->copy();
            $date->addDays(1);
        }
        $dL = [];
        $dV = [];
        foreach (array_reverse($stack) as $d){
            $dL[] .= Carbon::parse($d)->format('dS M');

        }
        foreach (array_reverse($stack) as $d){
            $date = Carbon::parse($d)->format('Y-m-d');
            $start = $date.' '.'00:00:00';
            $end = $date.' '.'23:59:59';
            $dC= User::whereBetween('created_at',[$start,$end])->get();
            $dV[] .= count($dC);
        }
        $data['dV'] = $dV;
        $data['dL'] = $dL;


        return view('dashboard.dashboard',$data);
    }

    public function manageUser()
    {
        $data['page_title'] = "Manage User";
        $data['user'] = User::latest()->paginate(10);
        return view('dashboard.manage-user',$data);
    }

    public function blockUser(Request $request)
    {
        $request->validate([
            'block_id' => 'required',
        ]);
        $user = User::findOrFail($request->block_id);
        if ($user->status == 1){
            $user->status = 0;
            $user->save();
        }else{
            $user->status = 1;
            $user->save();
        }
        session()->flash('message','Successfully Done');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function blockEmail(Request $request)
    {

        $request->validate([
            'email_id' => 'required',
        ]);
        $user = User::findOrFail($request->email_id);
        if ($user->verify_status == 1){
            $user->verify_status = 0;
            $user->save();
        }else{
            $user->verify_status = 1;
            $user->save();
        }
        session()->flash('message','Successfully Done');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function blockPhone(Request $request)
    {
        $request->validate([
            'phone_id' => 'required',
        ]);
        $user = User::findOrFail($request->phone_id);
        if ($user->phone_status == 1){
            $user->phone_status = 0;
            $user->save();
        }else{
            $user->phone_status = 1;
            $user->save();
        }
        session()->flash('message','Successfully Done');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function googleRecaptcha()
    {
        $data['page_title'] = 'Google Recaptcha';
        return view('dashboard.google-recaptcha',$data);
    }

    public function updateRecaptcha(Request $request, $id)
    {
        $request->validate([
           'captcha_secret' => 'required',
           'captcha_site' => 'required',
        ]);
        $basic = BasicSetting::first();
        $basic->captcha_status = $request->captcha_status == 'on' ? 1 : 0;
        $basic->captcha_secret = $request->captcha_secret;
        $basic->captcha_site = $request->captcha_site;
        $basic->save();
        session()->flash('message','Captcha Updated Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function createUser()
    {
        $data['page_title'] = 'Add new User';
        $data['plan'] = Plan::whereStatus(1)->get();
        return view('dashboard.user-create',$data);
    }

    public function submitUser(Request $request)
    {
        $request->validate([
           'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'plan_id' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        $plan = Plan::findOrFail($request->plan_id);
        $in = Input::except('_method','_token','password_confirmation');
        $in['password'] = Hash::make($request->password);
        $in['code'] = strtoupper(Str::random('6'));
        if ($plan->plan_type == 1){
            $in['expire_time']  = 1;
        }else{
            $in['expire_time']  = Carbon::parse()->addDays($plan->duration);
        }
        $in['verify_status'] = 1;
        $in['phone_code']= rand(11111,99999);
        $in['phone_status'] = 1;
        $in['plan_status'] = 1;
        $in['status'] = 0;

        User::create($in);
        session()->flash('message','User Added Successfully');
        session()->flash('type','success');
        return redirect()->back();

    }

    public function editUser($id)
    {
        $data['page_title'] = 'Edit User';
        $data['user'] = User::findOrFail($id);
        $data['plan'] = Plan::whereStatus(1)->get();
        return view('dashboard.user-edit',$data);
    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $request->validate([
           'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|unique:users,phone,'.$user->id,
            'plan_id' => 'required'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->telegram_username = $request->telegram_username;
        if ($user->plan_id != $request->plan_id){
            $plan = Plan::findOrFail($request->plan_id);
            if ($plan->plan_type == 1){
                $plan->expire_time  = 1;
            }else{
                $plan->expire_time  = Carbon::parse()->addDays($plan->duration);
            }
            $user->plan_id = $request->plan_id;
        }
        $user->save();
        session()->flash('message','User Updated Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function deleteUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        UserSignal::whereUser_id($user->id)->delete();
        $user->delete();
        session()->flash('message','User Deleted Successfully');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getCurrencyWidget()
    {
        $data['page_title'] = 'Currency Widget';
        return view('dashboard.currency-widget',$data);
    }

    public function submitCurrencyWidget(Request $request)
    {
        $section = Section::first();
        $section->currency_live = $request->currency_live;
        $section->currency_cal = $request->currency_cal;
        $section->save();
        session()->flash('message','Currency Widget Updated Successfully');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function staffRequest()
    {
        $data['page_title'] = "Staff Request";
        $data['user'] = StaffRequest::latest()->paginate(10);
        return view('dashboard.staff-request',$data);
    }

    public function staffrequestApprove(Request $request)
    {
        $request->validate([
           'confirm_id' => 'required'
        ]);
        $stff = StaffRequest::whereUser_id($request->confirm_id)->first();
        $stff->status = 1;
        $stff->save();

        $user = User::findOrFail($request->confirm_id);
        $user->signal_status = 1;
        $user->save();

        session()->flash('message','Staff request Approve.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function staffrequestReject(Request $request)
    {
        $request->validate([
            'reject_id' => 'required'
        ]);
        $stff = StaffRequest::whereUser_id($request->reject_id)->first();
        $stff->status = 2;
        $stff->save();

        $user = User::findOrFail($request->reject_id);
        $user->signal_status = 3;
        $user->save();

        session()->flash('message','Staff request Reject.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function providerSignal()
    {
        $data['page_title'] = 'Provide Signals';
        $data['signal'] = SubmitSignal::latest()->paginate(15);
        return view('dashboard.provider-signal',$data);
    }

    public function providerSignalView($id)
    {
        $data['page_title'] = 'Provider Signal View';
        $data['signal'] = SubmitSignal::findOrFail($id);
        $data['plan'] = Plan::whereStatus(1)->get();
        return view('dashboard.provider-signal-view',$data);
    }

    public function providerSignalSubmit(Request $request)
    {
        if ($request->status == 0){
            $request->validate([
               'signal_id' => 'required'
            ]);
            $submitSignal = SubmitSignal::findOrFail($request->signal_id);
            $submitSignal->status = 0;
            $submitSignal->view_status = 1;
            $submitSignal->save();
            session()->flash('message','Provider Signal Pending.');
            session()->flash('type','success');
            return redirect()->back();
        }elseif ($request->status == 1){
            $request->validate([
                'signal_id' => 'required',
                'title' => 'required',
                'plan_id' => 'required|array',
                'price' => 'required|numeric',
                'description' => 'required',
                'telegram' => 'required',
                'publish_status' => 'required',
            ]);
            $submitSignal = SubmitSignal::findOrFail($request->signal_id);
            $submitSignal->status = 1;
            $submitSignal->view_status = 1;
            $submitSignal->price = $request->price;
            $submitSignal->save();

            $user = User::findOrFail($submitSignal->user_id);
            $tr['custom'] = strtoupper(Str::random(12));
            $tr['user_id'] = $submitSignal->user_id;
            $tr['type'] = 1 ;
            $tr['balance'] = $request->price;
            $tr['post_balance'] = $user->balance + $request->price;
            $tr['details'] = 'For Signal Provide';
            TransactionLog::create($tr);
            $user->balance += $request->price;
            $user->save();

            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['telegram'] = $request->telegram;
            $data['publish_status'] = $request->publish_status;
            $data['publish_date'] = $request->publish_date;
            $data['plan_ids'] = implode(";", $request->plan_id);
            $sig = Signal::create($data);

            if ($sig->publish_status == 0){
                $signalPlan =  explode(';',$sig->plan_ids);
                $basic = BasicSetting::first();

                foreach ($signalPlan as $key => $value)
                {
                    $pp = Plan::findOrFail($value);

                    $users = User::whereVerify_status(1)->wherePhone_status(1)->wherePlan_status(1)->wherePlan_id($value)->get();

                    foreach ($users as $user){
                        $uu['user_id'] = $user->id;
                        $uu['signal_id'] = $sig->id;
                        $uu['plan_id'] = $value;
                        UserSignal::create($uu);
                        if ($pp->email_status == 1){
                            $this->sendSignalMail($user->id,$sig->id);
                        }
                        if ($pp->sms_status == 1){
                            $this->sendSignalSMS($user->id);
                        }
                        if ($basic->telegram_status == 1) {
                            if ($pp->telegram_status == 1) {
                                if ($user->telegram_id != null) {
                                    $botToken = $basic->telegram_token;
                                    $web = 'https://api.telegram.org/bot'.$botToken;
                                    $text = $sig->telegram;
                                    file_get_contents($web."/sendMessage?chat_id=".$user->telegram_id."&text=".$text);
                                }
                            }
                        }
                    }
                }
                $sig->status = 1;
                $sig->save();
                session()->flash('message','Provider Signal Approved.');
                session()->flash('type','success');
                return redirect()->back();
            }else{
                session()->flash('message','Provider Signal Approved.');
                session()->flash('type','success');
                return redirect()->back();
            }

        }else{
            $request->validate([
                'signal_id' => 'required'
            ]);
            $submitSignal = SubmitSignal::findOrFail($request->signal_id);
            $submitSignal->status = 2;
            $submitSignal->view_status = 1;
            $submitSignal->save();
            session()->flash('message','Provider Signal Rejected.');
            session()->flash('type','success');
            return redirect()->back();
        }
    }
    public function getTransactionLog()
    {
        $data['page_title'] = "Transaction Log";
        $data['log'] = TransactionLog::latest()->paginate(20);
        return view('dashboard.transaction-log',$data);
    }
    public function commentSubmit(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'signal_id' => 'required'
        ]);
        $in = Input::except('_method','_token');
        $in['user_id'] = 0;
        SignalComment::create($in);
        \session()->flash('message','Comment Submitted Successfully.');
        \session()->flash('type','success');
        return redirect()->back();
    }

    public function ratingSubmit(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'signal_id' => 'required',
            'rating' => 'required'
        ]);

        $in = Input::except('_method','_token');
        $in['user_id'] = 0;
        SignalRating::create($in);
        \session()->flash('message','Rating Submitted Successfully.');
        \session()->flash('type','success');
        return redirect()->back();
    }

}

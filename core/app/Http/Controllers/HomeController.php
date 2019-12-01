<?php

namespace App\Http\Controllers;

use App\BasicSetting;
use App\Category;
use App\Member;
use App\Menu;
use App\Partner;
use App\Post;
use App\Slider;
use App\Social;
use App\Speciality;
use App\Subscribe;
use App\Testimonial;
use App\TraitsFolder\CommonTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    use CommonTrait;

    public function __construct()
    {
        $this->middleware('checkInstaller');
        $this->middleware('checkMaintenance');
        $this->middleware('basicView');
    }

    public function getIndex()
    {

        $data['page_title'] = "Home Page";
        return view('errors.503');
        $data['slider'] = Slider::all();
        $data['category'] = Category::all();
        $data['speciality'] = Speciality::all();
        $data['testimonial'] = Testimonial::all();
        $data['plan'] = Plan::whereStatus(1)->get();
        $data['member'] = Member::all();
        $data['total_user'] = User::all()->count();
        $data['total_category'] = Category::all()->count();
        $data['total_blog'] = Post::all()->count();
        $data['total_signal'] = Signal::all()->count();
        $data['social'] = Social::all();
        $data['coupon'] = Coupon::whereStatus(1)->inRandomOrder()->first();
        $data['partner'] = Partner::all();
        $data['blog'] = Post::latest()->take(6)->get();
        $data['menus'] = Menu::all();
        $data['footer_category'] = Category::take(10)->get();
        return view('home.home',$data);
    }

    public function getMenu($id,$slug)
    {
        $data['men'] = Menu::whereId($id)->first();
        $data['page_title'] = $data['men']->name;
        $data['menus'] = Menu::all();
        $data['social'] = Social::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(10)->get();
        return view('home.menus',$data);
    }

    public function getAbout()
    {
        $data['page_title'] = 'About Us';
        $data['menus'] = Menu::all();
        $data['social'] = Social::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(10)->get();
        $data['team'] = Member::all();
        $data['total_user'] = User::all()->count();
        $data['total_category'] = Category::all()->count();
        $data['total_blog'] = Post::all()->count();
        $data['total_signal'] = Signal::all()->count();
        return view('home.about-us',$data);
    }

    public function getContact()
    {
        $data['page_title'] = 'Contact Us';
        $data['menus'] = Menu::all();
        $data['social'] = Social::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(10)->get();
        return view('home.contact-us',$data);
    }



    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $this->sendContact($request->email,$request->name,$request->subject,$request->message,$request->phone);
        session()->flash('message','Contact Message Successfully Send.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function submitSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribes,email'
        ]);
        $in = Input::except('_method','_token');
        Subscribe::create($in);
        session()->flash('message','Subscribe Completed.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getBlog()
    {
        $data['page_title'] = 'Blog Page';
        $data['blog'] = Post::latest()->paginate(3);
        $data['category'] = Category::all();
        $data['social'] = Social::all();
        $data['popular'] = Post::orderBy('views','desc')->take(15)->get();
        $data['menus'] = Menu::all();
        $data['footer_category'] = Category::take(10)->get();
        return view('home.blog',$data);
    }

    public function detailsBlog($slug)
    {
        $data['page_title'] = 'Blog Details';
        $data['blog'] = Post::whereSlug($slug)->first();
        $data['blog']->views = $data['blog']->views +1;
        $data['category'] = Category::all();
        $data['social'] = Social::all();
        $data['popular'] = Post::orderBy('views','desc')->take(10)->get();
        $data['blog']->save();
        $data['menus'] = Menu::all();
        $data['footer_category'] = Category::take(10)->get();
        return view('home.blog-details',$data);
    }

    public function categoryBlog($slug)
    {
        $category = Category::whereSlug($slug)->first();
        $data['page_title'] = $category->name.' - Blog';
        $data['blog'] = Post::whereCategory_id($category->id)->latest()->paginate(3);
        $data['category'] = Category::all();
        $data['social'] = Social::all();
        $data['popular'] = Post::orderBy('views','desc')->take(25)->get();
        $data['menus'] = Menu::all();
        $data['footer_category'] = Category::take(10)->get();
        return view('home.blog',$data);
    }


    public function getTermCondition()
    {
        $data['page_title'] = "Term And Condition";
        $data['social'] = Social::all();
        $data['menus'] = Menu::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(10)->get();
        return view('home.term-condition',$data);
    }

    public function getPrivacyPolicy()
    {
        $data['page_title'] = "Privacy And Policy";
        $data['social'] = Social::all();
        $data['menus'] = Menu::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(10)->get();
        return view('home.privacy-policy',$data);
    }

    public function submitCronJob()
    {
        $pendingSignal = Signal::whereStatus(0)->wherePublish_status(1)->where('publish_date','<',Carbon::now())->get();
        foreach ($pendingSignal as $sig){
            $signalPlan = explode(';', $sig->plan_ids);
            $basic = BasicSetting::first();

            foreach ($signalPlan as $key => $value) {
                $pp = Plan::findOrFail($value);
                $users = User::whereVerify_status(1)->wherePhone_status(1)->wherePlan_status(1)->wherePlan_id($value)->get();

                foreach ($users as $user) {
                    $uu['user_id'] = $user->id;
                    $uu['signal_id'] = $sig->id;
                    $uu['plan_id'] = $value;
                    UserSignal::create($uu);

                    if ($pp->email_status == 1) {
                        $this->sendSignalMail($user->id, $sig->id);
                    }
                    if ($pp->sms_status == 1) {
                        $this->sendSignalSMS($user->id);
                    }
                    if ($basic->telegram_status == 1) {
                        if ($pp->telegram_status == 1) {
                            if ($user->telegram_id != null) {
                                $botToken = $basic->telegram_token;
                                $web = 'https://api.telegram.org/bot' . $botToken;
                                $text = $sig->telegram;
                                file_get_contents($web . "/sendMessage?chat_id=" . $user->telegram_id . "&text=" . $text);
                            }
                        }
                    }
                }
            }
            $sig->status = 1;
            $sig->save();
        }

        $user = User::wherePlan_status(1)->where('expire_time','!=',1)->get();
        foreach ($user as $u){
            if ($u->expire_time < Carbon::now()){
                $u->plan_status = 0;
                $u->save();
            }
        }
    }

}

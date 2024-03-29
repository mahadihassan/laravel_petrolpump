<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkInstaller');
        $this->middleware('basicView');
        $this->middleware('auth:admin');
    }

    public function getSpecialitySection()
    {
        $data['page_title'] = 'Speciality Section';
        return view('section.speciality',$data);
    }

    public function submitSpecialitySection(Request $request)
    {
        $section = Section::first();
        $section->speciality_title = $request->speciality_title;
        $section->speciality_description = $request->speciality_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getCurrencySection()
    {
        $data['page_title'] = 'Currency Section';
        return view('section.currency',$data);
    }

    public function submitCurrencySection(Request $request)
    {
        $section = Section::first();
        $section->currency_title = $request->currency_title;
        $section->currency_description = $request->currency_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getPlanSection()
    {
        $data['page_title'] = 'Plan Section';
        return view('section.plan',$data);
    }

    public function submitPlanSection(Request $request)
    {
        $section = Section::first();
        $section->price_title = $request->price_title;
        $section->price_description = $request->price_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getAboutSection()
    {
        $data['page_title'] = 'About Section';
        return view('section.about',$data);
    }

    public function submitAboutSection(Request $request)
    {
        $section = Section::first();
        $section->about_title = $request->about_title;
        $section->about_description = $request->about_description;
        if($request->hasFile('about_image')){
            $image = $request->file('about_image');
            $filename = 'about_image'.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            $path = './assets/images/'.$section->about_image;
            File::delete($path);
            Image::make($image)->resize(435,360)->save($location);
            $section->about_image = $filename;
        }

        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getCouponSection()
    {
        $data['page_title'] = 'Coupon Section';
        return view('section.coupon',$data);
    }

    public function submitCouponSection(Request $request)
    {
        $section = Section::first();
        $section->coupon_title = $request->coupon_title;
        $section->coupon_description = $request->coupon_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getCounterSection()
    {
        $data['page_title'] = 'Counter Section';
        return view('section.counter',$data);
    }

    public function submitCounterSection(Request $request)
    {
        $section = Section::first();
        $section->counter_title = $request->counter_title;
        $section->counter_description = $request->counter_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getTestimonialSection()
    {
        $data['page_title'] = 'Testimonial Section';
        return view('section.testimonial',$data);
    }

    public function submitTestimonialSection(Request $request)
    {
        $section = Section::first();
        $section->testimonial_title = $request->testimonial_title;
        $section->testimonial_description = $request->testimonial_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getBlogSection()
    {
        $data['page_title'] = 'Blog Section';
        return view('section.blog',$data);
    }

    public function submitBlogSection(Request $request)
    {
        $section = Section::first();
        $section->blog_title = $request->blog_title;
        $section->blog_description = $request->blog_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getTeamSection()
    {
        $data['page_title'] = 'Team Section';
        return view('section.team',$data);
    }

    public function submitTeamSection(Request $request)
    {
        $section = Section::first();
        $section->team_title = $request->team_title;
        $section->team_description = $request->team_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getRegisterSection()
    {
        $data['page_title'] = 'Register Section';
        return view('section.register',$data);
    }

    public function submitRegisterSection(Request $request)
    {
        $section = Section::first();
        $section->register_title = $request->register_title;
        $section->register_description = $request->register_description;
        if($request->hasFile('register_image')){
            $image = $request->file('register_image');
            $filename = 'register_image'.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            $path = './assets/images/'.$section->register_image;
            File::delete($path);
            Image::make($image)->resize(755,736)->save($location);
            $section->register_image = $filename;
        }
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getLoginSection()
    {
        $data['page_title'] = 'Login Section';
        return view('section.login',$data);
    }

    public function submitLoginSection(Request $request)
    {
        $section = Section::first();
        $section->login_title = $request->login_title;
        $section->login_description = $request->login_description;
        if($request->hasFile('login_image')){
            $image = $request->file('login_image');
            $filename = 'register_image'.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            $path = './assets/images/'.$section->login_image;
            File::delete($path);
            Image::make($image)->resize(755,736)->save($location);
            $section->login_image = $filename;
        }
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

}

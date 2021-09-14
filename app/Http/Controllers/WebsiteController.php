<?php

namespace App\Http\Controllers;

use App\Models\AppointPage;
use App\Models\AppointQue;
use App\Models\Blog;
use App\Models\Doctor;
use App\Models\Faq;
use App\Models\Footer;
use App\Models\OpeningHour;
use App\Models\OurWork;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $slider = Slider::get();
        $service = Service::latest()->get();
        $faqs = Faq::latest()->get();
        $testimonial =Testimonial::latest()->get();
        $doctor = Doctor::latest()->get();
        // $footer = Footer::latest()->get();
        return view('website.index', compact('slider','service', 'faqs','testimonial', 'doctor'));
    }

    public function aboutUs()
    {
        // $footer = Footer::latest()->get();
        $service = Service::latest()->get();
        $ourwork = OurWork::latest()->get();
        $doctor = Doctor::latest()->get();
        $opening = OpeningHour::get();
        return view('website.about',compact('service','ourwork', 'opening','doctor'));
    }

    public function department()
    {
        // $footer = Footer::latest()->get();
        return view('website.department');
    }

    public function appointment()
    {
        // $footer = Footer::latest()->get();
        $appoint_que = AppointQue::latest()->get();
        $appoint_page = AppointPage::latest()->get();
        return view('website.appointment', compact('appoint_que','appoint_page'));
    }

    public function doctor()
    {
        // $footer = Footer::latest()->get();
        $doctor = Doctor::latest()->get();
        return view('website.doctor', compact( 'doctor'));
    }
    public function doctorList()
    {
        $doctor = Doctor::latest()->get();
        // $footer = Footer::latest()->get();
        return view('website.doctor_list', compact('doctor'));
    }
    // public function doctor_2()
    // {
    //     $footer = Footer::latest()->get();
    //     return view('website.doctor', compact('footer'));
    // }
    // public function doctor_3()
    // {
    //     $footer = Footer::latest()->get();
    //     return view('website.doctor', compact('footer'));
    // }
    public function singleDoctor($slug)
    {
        $doctor = Doctor::where('slug', $slug)->first();
        return view('website.single_doctor', compact('doctor'));
    }
    
    public function blog()
    {
        $blog = Blog::get();
        // $footer = Footer::latest()->get();
        return view('website.blog', compact('blog'));
    }
    public function contact()
    {
        // $footer = Footer::latest()->get();
        $opening = OpeningHour::get();
        return view('website.contact', compact('opening'));
    }
}

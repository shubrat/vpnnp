<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\BusinessMail;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\LocationMap;
use App\Models\Member;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Slider;
use App\Models\SpecialService;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PagesController extends Controller
{

// frontend 
public function index()
{
    return view('site.index',[
        'testimonials' => Testimonial::where('status', 1)->orderBy('id','desc')->limit(5)->get(),
        'blogs' => Blog::where('status', 1)->orderBy('id','desc')->limit(6)->get(),
        'specialServices' => SpecialService::where('status', 1)->orderBy('id','desc')->limit(6)->get(),
        'partners' =>Partner::where('status', 1)->orderBy('id','desc')->get(),
        'sliders'=>Slider::all(),
    ]);

}

    // for Faq
    public function faq()
    {
        return view('site.pages.faq_view' ,[
            'faqs' =>Faq::where('status', 1)->get(),
        ]);
    }


    // about us

    public function aboutUs()
    {
        return view('site.pages.about_view' ,[
            'about' =>AboutUs::firstOrFail(),
            'members' =>Member::where('status', 1)->get(),
        ]);
        
    }


    // contact page
    
    // fortestimonials
    public function contactUs()
    {
        return view('site.pages.contact_view' ,[
            'location' =>LocationMap::firstOrFail(),
            'serviceTypes' => Service::select(['id', 'title'])->whereStatus(TRUE)->get(),

        ]);
    }

     // rfQuote
     public function rfQuote()
     {
        return view('site.pages.contact_view' ,[
            'location' =>LocationMap::firstOrFail(),
            'serviceTypes' => Service::select(['id', 'title'])->whereStatus(TRUE)->get(),

        ]);
         
     }


    // fortestimonials
    public function testi()
    {
        return view('site.pages.testimonial_view' ,[
            'testimonials' =>Testimonial::where('status', 1)->orderBy('id','desc')->limit(25)->get(),
        ]);
    }

    //  Service

    public function service()
    {
        return view('site.services.index' ,[
            'services' =>Service::where('status', 1)->orderBy('id','desc')->limit(15)->get(),
        ]);
        
    }

   


    public function indexBlog()
    {
        return view('site.blogs.index' ,[
            'blogs' =>Blog::where('status', 1)->orderBy('id','desc')->limit(15)->get(),
        ]); 
    }

    
}

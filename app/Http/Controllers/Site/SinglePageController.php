<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Service;
use Illuminate\Http\Request;

class SinglePageController extends Controller
{

    public function singleService(Service $service)
    {
   $service= Service::findOrFail($service->id);
   return view('site.services.service_view' ,[
    'service' => $service,
    'serviceType' =>Service::where('status', 1)->orderBy('id','desc')->limit(7)->get(),

]);
    }

    public function singleBlog(Blog $blog)
    {
   $blog= Blog::findOrFail($blog->id);
   return view('site.blogs.blog_view' ,[
    'blog' => $blog,
    'allblogs' =>Blog::where('status', 1)->orderBy('id','desc')->limit(5)->get(),

]);


        
    }

}

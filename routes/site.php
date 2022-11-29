<?php

use App\Http\Controllers\Site\BusinessMailController;
use App\Http\Controllers\Site\ContactUsMailController;
use App\Http\Controllers\Site\NewsletterController;
use App\Http\Controllers\Site\PagesController;
use App\Http\Controllers\Site\SinglePageController;
use App\Models\Faq;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class , 'index'])->name('siteJoin.index');
Route::get('/faq', [PagesController::class , 'faq'])->name('siteJoin.faq');
Route::get('/testimonials', [PagesController::class , 'testi'])->name('siteJoin.testimonial');
Route::get('/services', [PagesController::class , 'service'])->name('siteJoin.service');
Route::get('/blogs', [PagesController::class , 'indexBlog'])->name('siteJoin.blog.index');
Route::get('/about-us', [PagesController::class , 'aboutUs'])->name('siteJoin.aboutUs.about');
Route::get('/contact', [PagesController::class , 'contactUs'])->name('siteJoin.contactUs.contact');
Route::get('/request-for-quote', [PagesController::class , 'rfQuote'])->name('siteJoin.businessUs.businness');

Route::get('/single-service/{service}', [SinglePageController::class , 'singleService'])->name('siteJoin.singleService.service');
Route::get('/single-blog/{blog}', [SinglePageController::class , 'singleBlog'])->name('siteJoin.singleBlog.blog');



Route::post('contact/store', [ContactUsMailController::class, 'sendMail'])->name('site.contact.store');
Route::post('business/store', [BusinessMailController::class, 'sendMail'])->name('site.business.store');


Route::post('site/newsletters', [NewsletterController::class, 'subscribe'])->name('newsletters.subscribe');


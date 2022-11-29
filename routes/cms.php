<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\CompanyDetailController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SpecialServiceController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Site\BusinessMailController;
use App\Http\Controllers\Site\ContactUsMailController;
use App\Http\Controllers\Site\NewsletterController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    // Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'],['prefix' => '/admin', 'as' => 'cms.'])->group(function () {




    Route::get('admin/dashboard', function () {
        return view('cms.dashboard');
    })->name('cms.dashboard');



    Route::get('/dashboard', function () {
        return view('cms.dashboard');
    })->name('dashboard');
});





// Route::group(, function () {
Route::group(['prefix' => '/admin', 'as' => 'cms.'], function () {

    //  For Setting
    // location map
    Route::get('location/edit', [SettingController::class, 'locationMap'])->name('location.create');
    Route::post('update/location', [SettingController::class, 'locationUpdate'])->name('location.update');

    // company
    Route::get('company-detail/edit', [CompanyDetailController::class, 'detailEdit'])->name('detail.create');
    Route::post('/company-details/update', [CompanyDetailController::class, 'detailStore'])->name('detail.store');

    // social Media.
    Route::get('edit/social-media', [SettingController::class, 'editSocialMedia'])->name('social.create');
    Route::post('update/social-media', [SettingController::class, 'updateSocialMedia'])->name('social.update');


    // Pages Controller
    // About Us Page All Route
    Route::get('edit/about', [PagesController::class, 'editAbout'])->name('edit.about');
    Route::post('update/about', [PagesController::class, 'updateAbout'])->name('about.update');

    // Privacy&Policy Page All Route
    Route::get('edit/privacy&policy', [PagesController::class, 'editPrivacyPolicy'])->name('privacy.edit');
    Route::post('update/privacy&policy', [PagesController::class, 'updatePrivacyPolicy'])->name('privacy.update');

    // Terms And Condition Page All Route
    Route::get('edit/term-and-condition', [PagesController::class, 'editTermAndCondition'])->name('term.edit');
    Route::post('update/term-and-condition', [PagesController::class, 'updateTermAndCondition'])->name('term.update');

    // contact
    Route::get('/contact', [ContactUsMailController::class, 'create'])->name('contacts.index');
    Route::get('/list-of-contact', [ContactUsMailController::class, 'contactList'])->name('contactUs.list');
    Route::DELETE('contact/delete/{contact}', [ContactUsMailController::class, 'contactdelete'])->name('contactUs.delete');
    Route::get('/contacts/status/toggle', [ContactUsMailController::class, 'toggleStatus'])->name('contacts.toggle.status');


    // FAQ All Route
    Route::get('create/faq', [FaqController::class, 'createFaq'])->name('faqs.create');
    Route::post('store/faq', [FaqController::class, 'storeFaq'])->name('store.faqs');
    Route::get('/faq', [FaqController::class, 'viewFaq'])->name('faqs.index');
    Route::get('edit/faq/{faq}', [FaqController::class, 'editFaq'])->name('faq.edit');
    Route::put('update/faq/{faq}', [FaqController::class, 'updateFaq'])->name('faq.update');
    Route::delete('delete/faq/{faq}', [FaqController::class, 'DeleteFaq'])->name('faq.delete');
    Route::get('/faqs/status/toggle', [FaqController::class, 'toggleStatus'])->name('faqs.toggle.status');


    // _________Controller______

    // slider
    Route::resource('slider', SliderController::class)->names('sliders')->except(['destroy', 'show']);
    Route::DELETE('/slider/delete/{slider}', [SliderController::class, 'delete'])->name('slider.delete');
    Route::get('/slider/status/toggle', [SliderController::class, 'toggleStatus'])->name('sliders.toggle.status');

    //category
    Route::resource('categories', categoryController::class)->names('categories')->except(['destroy', 'show']);
    Route::Post('/categories/delete/{category}', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::get('/categories/status/toggle', [CategoryController::class, 'toggleStatus'])->name('categories.toggle.status');

    //  sub category 
    Route::resource('sub-categories', SubCategoryController::class)->names('subCategories')->except(['destroy', 'show']);
    Route::Post('/sub-categories/delete/{subCategory}', [SubCategoryController::class, 'delete'])->name('subCategories.delete');
    Route::get('/sub-categories/status/toggle', [SubCategoryController::class, 'toggleStatus'])->name('subCategories.toggle.status');

    // products 
    Route::get('/products/taxable/toggle', [ProductController::class, 'toggleIsTaxable'])->name('products.toggle.taxable');
    Route::get('/products/featured/toggle', [ProductController::class, 'toggleIsFeatured'])->name('products.toggle.featured');
    Route::get('/products/refundable/toggle', [ProductController::class, 'toggleIsRefundable'])->name('products.toggle.refundable');
    Route::get('/products/trending/toggle', [ProductController::class, 'toggleIsTrending'])->name('products.toggle.trending');
    Route::get('/products/sellable/toggle', [ProductController::class, 'toggleIsSellable'])->name('products.toggle.sellable');

    Route::delete('/products-gallery/{gallery}', [ProductController::class, 'galleryDestroy'])->name('products.gallery.destroy');
    Route::put('/products-gallery/{product}', [ProductController::class, 'galleryUpdate'])->name('products.gallery.update');
    Route::resource('/products', ProductController::class)->names('products')->except('show');

    

    // Products
    Route::resource('services', ServiceController::class)->names('services')->except(['destroy', 'show']);
    Route::DELETE('/services/delete/{service}', [ServiceController::class, 'delete'])->name('services.delete');
    Route::get('/services/status/toggle', [ServiceController::class, 'toggleStatus'])->name('services.toggle.status');
    Route::get('/services/feature/toggle', [ServiceController::class, 'toggleIsFeature'])->name('services.toggle.feature');


    // Services
    Route::resource('special-services', SpecialServiceController::class)->names('specialServices')->except(['destroy', 'show']);
    Route::DELETE('/special-services/delete/{specialService}', [SpecialServiceController::class, 'delete'])->name('specialServices.delete');
    Route::get('/special-services/status/toggle', [SpecialServiceController::class, 'toggleStatus'])->name('specialServices.toggle.status');

    // member
    Route::resource('members', MemberController::class)->except(['destroy', 'show']);
    Route::DELETE('/members/delete/{member}', [MemberController::class, 'delete'])->name('members.delete');
    Route::get('/members/status/toggle', [MemberController::class, 'toggleStatus'])->name('members.toggle.status');


    // Partner
    Route::resource('partners', PartnerController::class)->except(['destroy', 'show']);
    Route::DELETE('/partners/delete/{partner}', [PartnerController::class, 'delete'])->name('partners.delete');
    Route::get('/partners/status/toggle', [PartnerController::class, 'toggleStatus'])->name('partners.toggle.status');


    // Blogs 
    Route::resource('blogs', BlogController::class)->except(['show', 'destroy']);
    Route::DELETE('/blogs/{blog}', [BlogController::class, 'delete'])->name('blogs.delete');
    Route::get('/blogs/status/toggle', [BlogController::class, 'toggleStatus'])->name('blogs.toggle.status');



    // testimonials
    Route::resource('/testimonials', TestimonialController::class)->names('testimonials')->except('show', 'destroy');
    Route::DELETE('/testimonial/delete/{testimonial}', [TestimonialController::class, 'delete'])->name('testimonial.delete');
    Route::get('/testimonial/status/toggle', [TestimonialController::class, 'toggleStatus'])->name('testimonials.toggle.status');


    // business mail


    Route::get('/business-create', [BusinessMailController::class, 'createBusiness'])->name('business.create');
    Route::get('/list-of-business', [BusinessMailController::class, 'businessList'])->name('business.list');
    Route::DELETE('list-of-business/{businessMail}', [BusinessMailController::class, 'businessdelete'])->name('business.delete');
    Route::get('/business/status/toggle', [BusinessMailController::class, 'toggleStatus'])->name('business.toggle.status');


    // news letter
    Route::get('/newsletters/create', [NewsletterController::class, 'create'])->name('newsletter.create');
    Route::get('/newsletters/lists', [NewsletterController::class, 'index'])->name('newsletters.index');
    Route::delete('/newsletters/{newsletter}', [NewsLetterController::class, 'destroy'])->name('newsletters.delete');

















    // admin logout
    Route::get('/logout', [AdminController::class, 'Logout'])->name('logout');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

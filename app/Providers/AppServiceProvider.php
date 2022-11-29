<?php

namespace App\Providers;

use App\Models\CompanyDetail;
use App\Models\SocialMedia;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
     View()->share('companyDetail', CompanyDetail::firstOrFail());
     View()->share('socialmedia', SocialMedia::firstOrFail());
     View()->share('socialmedia', SocialMedia::firstOrFail());
    }
}

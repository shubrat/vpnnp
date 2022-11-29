<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeComponentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        # CMS Layout
        Blade::component('cms._layouts.master', 'cms-master-layout');
        Blade::component('cms._layouts._partials.top-bar', 'cms-top-bar');
        Blade::component('cms._layouts._partials.navigation', 'cms-navigation');
        Blade::component('cms._layouts._partials.footer', 'cms-footer');


         # Site Layout
         Blade::component('site._layouts.site_master', 'site-master-layout');
         Blade::component('site._layouts._partials.top-bar', 'site-top-bar');
         Blade::component('site._layouts._partials.navigation', 'site-navigation');
         Blade::component('site._layouts._partials.script', 'site-script');
         Blade::component('site._layouts._partials.footer', 'site-footer');

        // UI Elements
        Blade::component('cms.components.ui-elements.breadcrumb', 'breadcrumb');
        Blade::component('cms.components.ui-elements.error', 'error');
        Blade::component('cms.components.ui-elements.team-card', 'team-card');
        Blade::component('cms.components.ui-elements.table-base', 'table-base');

        // Form Elements
        Blade::component('cms.components.ui-elements.form-base', 'form-base');
        Blade::component('cms.components.form-elements.input-field', 'input-field');
        Blade::component('cms.components.form-elements.select-field', 'select-field');
        Blade::component('cms.components.form-elements.select-field-name', 'select-field-name');
        Blade::component('cms.components.form-elements.select-2', 'select-searchable');
        Blade::component('cms.components.form-elements.text-area-field', 'text-area-field');
        Blade::component('cms.components.form-elements.file-field', 'file-field');
        Blade::component('cms.components.form-elements.button', 'button');
        Blade::component('cms.components.form-elements.switch', 'switch');
        Blade::component('cms.components.form-elements.file-browser-image', 'file-browser-image');
        Blade::component('cms.components.form-elements.file-gallery-image', 'file-gallery-image');

        // C:\xampp\htdocs\tcn\resources\views\cms\components\scripts\file-manager.blade.php

        Blade::component('cms.components.scripts.file-manager', 'file-manager');
    }
}

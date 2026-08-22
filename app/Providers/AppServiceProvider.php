<?php

namespace App\Providers;

use App\Models\ContactInfo;
use App\Models\FooterSetting;
use App\Models\NavbarSetting;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        Paginator::USeBootstrap();

        View::composer('front.includes.navbar', function ($view) {
            $view->with('navbar', NavbarSetting::first());
        });

        View::composer('front.includes.footer', function ($view) {
            $view->with([
                'navbar'      => NavbarSetting::first(),
                'footer'      => FooterSetting::first(),
                'contactInfo' => ContactInfo::first(),
                'products'    => Product::where('is_active', true)->orderBy('order_index')->get(),
            ]);
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Illuminate\Support\Facades\Route;

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
        view()->composer('*',function($settings){
            $settings->with('url', Route::currentRouteName());
             $settings->with('gsetting', DB::table('pos_settings')->find(1));
            // $settings->with('gcontact', DB::table('contactpages')->find(1));

            if (!session()->has('popup'))
            {
                view()->share('visit', 1);
            }
            session()->put('popup' , 1);
        });
        // Schema::defaultStringLength(191);
    }
}

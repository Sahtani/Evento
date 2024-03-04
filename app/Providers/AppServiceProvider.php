<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Schema::defaultStringLength(191); //Update defaultStringLength

        Blade::if('user', function () {
            return Auth::check() && Auth::user()->role ==='user';
        });
        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->role==='admin';
        });
        Blade::if('organizator', function () {
            return Auth::check() && Auth::user()->role==='organizator';
        });
    }
}

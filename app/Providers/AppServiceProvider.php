<?php

namespace App\Providers;

use App\Models\Footer;
use App\Models\Notification;
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
        $footer = Footer::first();
        View::share(['footer' => $footer]);
        $notification = Notification::where('notification', 0)->get();
        View::share(['notification' => $notification]);

    }
}

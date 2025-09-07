<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
    public function boot(): void
    {
           View::composer('*', function ($view) {
        if (Auth::check()) {
            $view->with('authUserName', Auth::user()->name);
            $view->with('authUserImage', asset('storage/' . Auth::user()->image ?? 'users/user.jpg'));
            $view->with('authUserRole', Auth::user()->role);
        }
    });
    }
}

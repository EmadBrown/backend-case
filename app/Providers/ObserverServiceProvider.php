<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Admin;
use App\Observers\UserObserver;
use App\Observers\AdminObserver;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Admin::observe(AdminObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

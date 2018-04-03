<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomEloquentEventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \App\Admin\Permission::observe(\App\Observers\PermissionObserver::class);
        \App\Admin\Role::observe(\App\Observers\RoleObserver::class);
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

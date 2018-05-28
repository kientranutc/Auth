<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $repositories = [
            'Role\RoleRepositoryInterface' => 'Role\RoleRepository',
        ];
        foreach ($repositories as $key=>$val){
           $this->app->bind("App\\Repositories\\$key", "App\\Repositories\\$val");
        }
    }
}

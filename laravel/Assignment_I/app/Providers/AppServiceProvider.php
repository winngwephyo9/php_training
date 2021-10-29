<?php

namespace App\Providers;

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
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\Products\ProductDaoInterface', 'App\Dao\Products\ProductDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Products\ProductServiceInterface', 'App\Services\Products\ProductService');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

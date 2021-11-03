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
        $this->app->bind('App\Contracts\Dao\Books\BookDaoInterface', 'App\Dao\Books\BookDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Products\ProductServiceInterface', 'App\Services\Products\ProductService');
        $this->app->bind('App\Contracts\Services\Books\BookServiceInterface', 'App\Services\Books\BookService');
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

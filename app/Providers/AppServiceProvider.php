<?php

namespace App\Providers;

use App\Repositories\CustomersRepository;
use App\Repositories\ImagesRepository;
use App\Repositories\OrdersRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ProductsRepository;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Registering mode repositories

        $this->app->bind(ProductsRepository::class, function ($app) {
             return new ProductsRepository(); });

        $this->app->bind(CustomersRepository::class, function ($app) {
        return new CustomersRepository(); });
        
        $this->app->bind(OrdersRepository::class, function ($app) {
            return new OrdersRepository(); });

        $this->app->bind(ImagesRepository::class, function ($app) {
                return new ImagesRepository(); });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         //
         Paginator::useBootstrap();
    }
}

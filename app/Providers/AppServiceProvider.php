<?php

namespace App\Providers;

use App\Repositories\CustomersRepository;
use App\Repositories\ImagesRepository;
use App\Repositories\OrdersRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ProductsRepository;
use App\Services\IPaymentMethod;
use App\Services\StripePayment;
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

        $this->app->singleton(ProductsRepository::class, function ($app) {
             return new ProductsRepository(); });

        $this->app->singleton(CustomersRepository::class, function ($app) {
        return new CustomersRepository(); });
        
        $this->app->singleton(OrdersRepository::class, function ($app) {
            return new OrdersRepository(); });

        $this->app->singleton(ImagesRepository::class, function ($app) {
                return new ImagesRepository(); });
       
        $this->app->singleton(IPaymentMethod::class, function($app){
            // if($app->request->pay_mode =='stripe') //not in use coz of 1 payment method
               return new StripePayment(); });

       
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

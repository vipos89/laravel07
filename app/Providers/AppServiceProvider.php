<?php

namespace App\Providers;

use App\Models\Product;
use App\Services\TestService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {


        View::composer('layouts.shop', function ($view){
            $cart = Session::get('cart', []);
            $productIds = array_keys($cart);
            $products = Product::query()
                ->whereIn('id', $productIds)
                ->get();
            $view->with('cart', $cart);
            $view->with('cart_products', $products);
        });


    }
}

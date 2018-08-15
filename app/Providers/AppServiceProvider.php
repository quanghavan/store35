<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; 
use App\Category;
use Illuminate\Support\Facades\View;
use App\Product;
use Cart;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        $category = Category::all();
        $product_sell = Product::has('orderDetails')->get();
        View::share(compact(
            [
                'category', 
                'product_sell',
            ]
        ));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

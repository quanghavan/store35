<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Cart;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        view()->composer('*', function ($view) 
        {
            if (Auth::check()) {
                $wl_sl = Cart::instance('wishlist_'.Auth::user()->id)->count();
                $cart_init = Cart::instance(Auth::user()->id)->content();
                $amount = Cart::instance(Auth::user()->id)->subtotal();
                $view->with('amount', $amount ); 
            } else {
                $cart_init = array();
                $wl_sl = 0;
            }
            $view->with('wl_sl', $wl_sl );  
            $view->with('compare_sl', Cart::instance('compare')->count());
            $view->with('cart_init', $cart_init );    
        });  
    }
}

<?php

namespace App\Providers;

use App\Billing\Stripe;
use App\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        view()->composer('layouts.sidebar',function($view){
            $view->with('archives',Post::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton(Stripe::class,function(){
           return new Stripe(config('services.stripe.secret')) ;
        });
    }
}

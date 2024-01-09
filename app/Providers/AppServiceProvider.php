<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Order;

class AppServiceProvider extends ServiceProvider
{
    // /
    //  * Register any application services.
    //  *
    //  * @return void
    //  */
    public function register()
    {
        //
    }

    // /
    //  * Bootstrap any application services.
    //  *
    //  * @return void
    //  */
    public function boot()
    {
        View::share('todayorders',
        Order::whereDate('created_at',date('y-m-d'))
        ->orderby ('created_at','desc')->get());
    }
}
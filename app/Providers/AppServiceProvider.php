<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

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
        //View::share('productName','Tên sản phẩm'); //all

        View::composer(['pages/thongtin','pages/detail'],function($view){

            // $productName = "Tên sp";
            // $price = 121212;
            // $view->with($productName,$price);

            $view->with([
                'productName'=>'Tên sản phẩm',
                'price' => 1234567
            ]);
        });
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

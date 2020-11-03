<?php

namespace App\Providers;

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
        //设置监听事件
        //	\DB::listen(function($query){
        //		var_dump($query->sql);
        //		var_dump($query->bindings);
        //		echo "<br/>";
        //	});
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

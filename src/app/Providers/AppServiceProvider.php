<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator; //ページャー(ページネーション)をBootstrapで装飾するために追記

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //ページャー(ページネーション)をBootstrapで装飾するために追記
        Paginator::useBootstrap();
    }
}

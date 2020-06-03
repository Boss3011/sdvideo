<?php

namespace App\Providers;
use App\Models\Category;
use App\Models\Myvideo;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      Schema::defaultStringlength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('categories',Category::get());
        view()->share('myvideos',Myvideo::get());
    }
}

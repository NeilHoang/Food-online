<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Dish;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('frontend.include.banner', function ($view) {
            $view->with('categories', Category::where('category_status', 1)->get());
        });
        View::composer('frontend.food.dish', function ($view) {
            $view->with('categories', Category::where('category_status', 1)->get());
        });
        $dishes = Dish::all();
        View::share('dishes', $dishes);
    }
}

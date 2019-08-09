<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('partials._s-extra', function($view){
           $view->with('popularPosts', Post::orderBy('views','desc')->take(6)->get());
           $view->with('tags', Tag::all());
        });
        view()->composer('partials._header', function($view){
           $view->with('categories', Category::all());
        });
        view()->composer('partials.pageheader-content', function($view){
           $view->with('recentPosts', Post::orderBy('date','desc')->take(2)->get());
        });
    }
}

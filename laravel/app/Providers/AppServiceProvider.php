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
        view()->composer('user.navbar',function($view){
            $view->with('tags',\App\Tag::IsPublished()->get());
            $view->with('static_pages',\App\StaticPage::all()->lists('published','name'));
        } );
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

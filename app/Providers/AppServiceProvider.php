<?php

namespace App\Providers;

use App\Article;
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
        $lastPostedArticle = Article::get()->last() ? Article::get()->last()->name : 'No Article';
//        View::share('lastPostedArticle',$lastPostedArticle);
        View::composer('master', function ($view) use ($lastPostedArticle) {
            return $view->with('lastPostedArticle',$lastPostedArticle);
        });
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BlogService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Blog
        $this->app->bind(
            'BlogService', BlogService::class
        );

        //Match
        $this->app->bind(
            \App\Repositories\Match\MatchRepositoryInterface::class,
            \App\Repositories\Match\MatchRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (request()->isSecure()) {
            \URL::forceScheme('https');
        }
    }
}

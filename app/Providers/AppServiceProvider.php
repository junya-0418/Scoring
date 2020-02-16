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
        $this->app->bind('BlogService', BlogService::class);
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

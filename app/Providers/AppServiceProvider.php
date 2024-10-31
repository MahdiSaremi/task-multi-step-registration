<?php

namespace App\Providers;

use App\ServerApi\Contracts\ApiClient;
use App\ServerApi\Test\TestApiClient;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(ApiClient::class, TestApiClient::class);
    }
}

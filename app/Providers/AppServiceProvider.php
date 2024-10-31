<?php

namespace App\Providers;

use App\Secondary\Contracts\ApiClient;
use App\Secondary\Test\TestApiClient;
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

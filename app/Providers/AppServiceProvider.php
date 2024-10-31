<?php

namespace App\Providers;

use App\Secondary\Contracts\SecondaryApi;
use App\Secondary\Test\TestApi;
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
        $this->app->singleton(SecondaryApi::class, TestApi::class);
    }
}

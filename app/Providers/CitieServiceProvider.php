<?php

namespace App\Providers;

use App\Contracts\CitiesContract;
use App\Services\CitieService;
use Illuminate\Support\ServiceProvider;

class CitieServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CitiesContract::class, CitieService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

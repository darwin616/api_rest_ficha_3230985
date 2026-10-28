<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CentroInterface;
use App\Repositories\CentroRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CentroInterface::class, CentroRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

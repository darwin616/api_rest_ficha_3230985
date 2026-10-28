<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\NivelFormacionInterface;
use App\Repositories\NivelFormacion;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(NivelFormacionInterface::class, NivelFormacion::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}


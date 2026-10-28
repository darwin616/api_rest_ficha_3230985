<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Jornada;
use App\Reppsitories\JornadaRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Jornada::class, JornadaRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

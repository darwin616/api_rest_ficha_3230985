<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\EventoFormacionInterface;
use App\Repositories\EventoFormacionRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EventoFormacionInterface::class, EventoFormacionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

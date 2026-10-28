<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\FichaInterface;
use App\Repositories\FichaRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(FichaInterface::class, FichaRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
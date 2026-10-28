<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\VigenciaInterface;
use App\Repositories\VigenciaRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(VigenciaInterface::class, VigenciaRepository ::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

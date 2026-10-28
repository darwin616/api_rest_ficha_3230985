<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AprendizInterface;
use App\Repositories\AprendizRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BaseDatosInterface::class, AprendizRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

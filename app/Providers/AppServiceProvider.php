<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\interfaces\EspecialidadInterface;
use app\repositories\EspecialidadRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BaseDatosInterface::class, EspecialidadRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

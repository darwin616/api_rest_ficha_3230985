<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CompetenciaInterface;
use App\Repositories\CompetenciaRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BaseDatosInterface::class);
    }

    public function boot(): void
    {
        //
    }
}

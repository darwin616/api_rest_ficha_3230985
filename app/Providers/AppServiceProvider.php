<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\CompetenciaInterface;
use App\Repositories\CompetenciaRepository;
use App\Interfaces\ModalidadInterface;
use App\Repositories\ModalidadRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
       $this->app->bind(BaseDatosInterface::class);
       $this->app->bind(ModalidadInterface::class, ModalidadRepository::class);
    }

    public function boot(): void
    {
        //
    }
}

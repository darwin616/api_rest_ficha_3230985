<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AmbienteInterface;
use App\Repositories\AmbienteRepository;
use App\Interfaces\CompetenciaInterface;
use App\Repositories\CompetenciaRepository;
use App\Interfaces\ModalidadInterface;
use App\Repositories\ModalidadRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AmbienteInterface::class, AmbienteRepository::class);
       $this->app->bind(BaseDatosInterface::class);
       $this->app->bind(ModalidadInterface::class, ModalidadRepository::class);
    }

    public function boot(): void
    {
        //
    }
}

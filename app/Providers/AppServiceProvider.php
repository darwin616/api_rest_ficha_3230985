<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AprendizInterface;
use App\Repositories\AprendizRepository;
use App\Interfaces\InstructorInterface;
use App\repositories\InstructorRepository;
use App\Interfaces\RolInterface;
use App\Repositories\RolRepository;
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
        $this->app->bind(BaseDatosInterface::class, AprendizRepository::class);
        $this->app->bind(InstructorInterface::class, InstructorRepository::class);
        $this ->app->bind(RolInterface::class, RolRepository::class);
        $this->app->bind(AmbienteInterface::class, AmbienteRepository::class);
       $this->app->bind(BaseDatosInterface::class);
       $this->app->bind(ModalidadInterface::class, ModalidadRepository::class);
    }

    public function boot(): void
    {
        //
    }
}

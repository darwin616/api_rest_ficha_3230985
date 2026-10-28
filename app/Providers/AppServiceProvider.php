<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\EventoFormacionInterface;
use App\Repositories\EventoFormacionRepository;
use App\Interfaces\ResultadoAprendizajeInterface;
use App\Repositories\ResultadoAprendizajeRepository;
use App\Interfaces\DiaInterface;
use App\Repositories\DiaRepository;
use App\Interfaces\UsuarioInterface;
use App\Repositories\UsuarioRepository;
use App\Interfaces\NivelFormacionInterface;
use App\Repositories\NivelFormacion;
use App\Interfaces\FichaInterface;
use App\Repositories\FichaRepository;
use App\interfaces\EspecialidadInterface;
use app\repositories\EspecialidadRepository;
use App\Interfaces\MallaTrimestralInterface;
use App\Repositories\MallaTrimestralRepository;
use App\Interfaces\ProgramaFormacionInterface;
use App\Repositories\ProgramaFormacionRepository;
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
        $this->app->bind(EventoFormacionInterface::class, EventoFormacionRepository::class);
        $this->app->bind(ResultadoAprendizajeInterface::class, ResultadoAprendizajeRepository::class);
        $this->app->bind(DiaInterface::class, DiaRepository::class);                                                                                                     
        $this->app->bind(UsuarioInterface::class, UsuarioRepository::class);
        $this->app->bind(NivelFormacionInterface::class, NivelFormacion::class);
        $this->app->bind(FichaInterface::class, FichaRepository::class);
        $this->app->bind(BaseDatosInterface::class, EspecialidadRepository::class);
        $this->app->bind(MallaTrimestralInterface::class, MallaTrimestralRepository::class);
        $this->app->bind(ProgramaFormacionInterface::class, ProgramaFormacionRepository::class);
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

}

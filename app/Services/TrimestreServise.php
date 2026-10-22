
<?php

namespace App\Services;

use App\Interfaces\TrimestreInterface;

class TrimestreService
{
    protected TrimestreInterface $trimestreRepository;

    public function __construct(TrimestreInterface $trimestreRepository)
    {
        $this->trimestreRepository = $trimestreRepository;
    }

    public function findByVigencia(int $vigencia_id)
    {
        return $this->trimestreRepository->findByVigencia($vigencia_id);
    }

    public function findByNumero(int $numero)
    {
        return $this->trimestreRepository->findByNumero($numero);
    }

    public function findByNombre(string $nombre)
    {
        return $this->trimestreRepository->findByNombre($nombre);
    }

    public function findByFechaInicio(string $fecha_inicio)
    {
        return $this->trimestreRepository->findByFechaInicio($fecha_inicio);
    }

    public function findByFechaFin(string $fecha_fin)
    {
        return $this->trimestreRepository->findByFechaFin($fecha_fin);
    }
}

<?php

namespace App\Services;

use App\Interfaces\JornadaInterface;

class JornadaService
{
    protected JornadaInterface $JornadaRepository;

    public function _construct(JornadaInterface $JornadaRepository)
    {
        $this->JornadaRepository = $JornadaRepository ;
    }
    public function getAll(){
        return $this->JornadaRepository->getAll();
    }

    public function findByName (string $nombre)
    {
        return $this->findByName($nombre);
    }
    public function findByHora_inicio(string $hora_inicio)
    {
        return $this->findByHora_inicio($hora_inicio);
    }
    public function findByHora_fin(string $Hora_fin)
    {
        return $this->findByHora_fin($Hora_fin); 
    }

}
<?php

namespace App\Repositories;
use App\Models\ResultadoAprendizaje;

class ResultadoAprendizajeRepository extends BaseRepository implements ResultadoAprendizajeInterface
{
    public function __construct(ResultadoAprendizaje $resultadoaprendizaje)
    {
        parent::__construct($resultadoaprendizaje);
    }

     public function finByHour(int $horas)
     {
        return $this->model->where("horas", $horas)->get();
     }

      public function finByName(string $nombre)
      {
        return $this->model->where("nombre", "LIKE",  "%". $nombre. "%")->get();
      }

      public function finByCompetency(string $competencias)
      {
        return $this->model->where("competencias", $competencias)->get();
      }
      
    
}
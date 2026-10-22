<?php

namespace App\Repositories;
use App\Models\Competencia;

class CompetenciaRepository extends BaseRepository implements CompetenciaInterface
{

     public function __construct(Competencia $competencia)
     {
        parent::__construct($competencia);
        }

     public function findByCode(int $codigo)
    {
        return $this->model->where('codigo', $codigo)
                ->orderBy('codigo', 'asc')
                ->get(); 
    }

     public function findByName(strign $nombre)
     {
        return $this->model->where("nombre", $nombre);
     }

        public function findByHour(int $horas)
    {
        return $this->model->where("horas", $horas);
    }
     
    public function findByHourAndName(int $horas, string $nombre)
    {
        $consulta = $this->model->where("horas", $horas)
                            ->where("nombre", $nombre);

        if ($consulta->exists()) 
         {
            return $consulta;
         }

         return null;
    }




}
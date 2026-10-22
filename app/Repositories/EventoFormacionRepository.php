<?php

namespace App\Repositories;
use App\Models\EventoFormacion;
use Carbon\Carbon;
class EventoFormacionRepository extends BaseRepository implements EventoFormacionInterface
{
    public function __constructor(EventoFormacion $EventoFormacion)
    {
        parent::__constructor($EventoFormacion);
    }

    public function findByHour(int $horaInicio, int $horaFin)
    {
        return $this->model->where("hora_inicio ", $horaInicio)
                            ->where("hora_fin", $horaFin)
                            ->get();
    }
    public function findByDay(int $diaId)
    {
        return $this->model->where("dia", $diaId)->get();
    }
    public function findByDate(carbon $fechaInicio, carbon $fechaFin )
    {
        return $this->model->where("fecha_inicio", $fechaInicio)
                           ->where("fecha_fin",$fechaFin)
                           ->get();
        
    }
}
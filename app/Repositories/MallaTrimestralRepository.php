<?php

namespace App\Repositories;

use App\Models\MallaTrimestral;

class MallaTrimestralRepository extends BaseRepository implements MallaTrimestralInterface
{
    public function __construct(MallaTrimestral $mallatrimestral)
    {
        parent::__construct($mallatrimestral);
    }

    public function findByPrograma(int $programa_formacion_id)
    {
        return $this->model->where("programa_formacion_id", $programa_formacion_id)->get();
    }

    public function findByTrimestre(int $trimestre_id)
    {
        return $this->model->where("trimestre_id", $trimestre_id)->get();
    }

    public function findByResultado(int $resultado_aprendizaje_id)
    {
        return $this->model->where("resultado_aprendizaje_id", $resultado_aprendizaje_id)->get();
    }

    public function findByHora(int $horas_programadas)
    {
        return $this->model->where("horas_programadas", $horas_programadas)->get();
    }

    public function findByOrden(string $orden)
    {
        return $this->model->where('orden', $orden)
                           ->orderBy('orden', 'asc')
                           ->get();
    }

}
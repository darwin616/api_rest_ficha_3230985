<?php

namespace App\Repositories;

use App\Models\Ficha;
use Carbon\Carbon;

class FichaRepository extends BaseRepository implements FichaInterface
{

    public function __construct(Ficha $ficha)
    {
        parent::__construct($ficha);
    }
    public function findByDate(Carbon $fechaInicio, Carbon $fechaFin)
    {
        return $this->model->whereBetween('fechaInicio', [$fechaInicio, $fechaFin])->get();
    }

    public function findByNumber(string $numero)
    {
        return $this->model->where('numero', $numero)->get();
    }

    public function findByState(string $estado)
    {
        return $this->model->where('estado', $estado)->get();
    }
}
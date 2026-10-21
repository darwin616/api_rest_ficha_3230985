<?php

namespace App\Interfaces;

interface FichaInterface extends BaseInterface
{
    public function findByDate(date $fechaInicio, date $fechaFin);
    public function findByNumber(string $numero);
    public function findByState(string $estado);

}
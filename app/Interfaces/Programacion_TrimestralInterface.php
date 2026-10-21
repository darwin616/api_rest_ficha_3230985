<?php

namespace App\Interfaces;

interface Programacion_TrimestralInterface extends BaseInterface
{
    public function getByFicha(int $ficha);

    public function getByTrimestre(int $trimestre);

    public function FindByEstado(string $estado);
}
<?php

namespace App\interfaces;

interface EventoFormacionInterface extends BaseInterface
{
public function findByHour(int $horaInicio, int $horaFin);
public function findByDay(int $diaId);
public function findByDate(carbon $fechaInicio, carbon $fechaFin );
}
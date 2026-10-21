<?php

namespace App\interfaces;

interface EventoFormacionInterface extends BaseInterface
{
public function findByHour(int $horaInicio, int $horaFin);
public function findByDay(int $diaId);
public function findByDate(carbon $fechaInicio, carbon $fechaFin );
public function findByProgramaTrimestral(int $programaTrimestral);
public function findByResultadoTrimestral(int $ResultadoTrimestral);
public function findByInstructor(int $Instructor);
public function findByAmbiente(int $Ambiente);


}
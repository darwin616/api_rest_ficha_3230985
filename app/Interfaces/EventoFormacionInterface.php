<?php

namespace App\interfaces;

interface EventoFormacionInterface extends BaseInterface
{
public function FindByHour(int $horaInicio, int $horaFin);
public function FindByDay(int $diaId);
public function FindByDate(carbon $fechaInicio, carbon $fechaFin );
public function FindByProgramaTrimestral(int $programaTrimestral);
public function FindByResultadoTrimestral(int $ResultadoTrimestral);
public function FindByInstructor(int $Instructor);
public function FindByAmbiente(int $Ambiente);


}
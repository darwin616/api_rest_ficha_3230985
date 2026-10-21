<?php

namespace App\Interfaces;

interface MallaTrimestralInterface extends BaseInterface
{   
    public function findByPrograma(int $programa_formacion_id);
    public function findByTrimestre(int $trimestre_id);
    public function findByResultado(int $resultado_aprendizaje_id);
    public function findByHora(int $horas_programadas);
    public function findByOrden(string $orden);
}
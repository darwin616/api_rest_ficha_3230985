<?php
namespace App\Interfaces;

interface ResultadoAprendizajeInterface extends BaseInterface
{
    public function finByhour(int $horas);
    public function finByname(string $nombre);
    public function finBycompetency(string $competencias);
}
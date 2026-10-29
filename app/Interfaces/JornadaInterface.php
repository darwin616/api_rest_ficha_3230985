<?php

namespace App\Interfaces;

interface JornadaInterface extends BaseInterface
{
    public function findBynombre(string $nombre);
    public function findByHora_inicio(string $Hora_inicio);
    public function findByHora_fin(string $Hora_fin);

}

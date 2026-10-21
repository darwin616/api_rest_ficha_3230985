<?php

namespace App\Interfaces;

interface TrimestreInterface extends BaseInterface
{
    public function findByVigencia(int $vigencia_id);
    public function findByNumero(int $numero);
    public function findByNombre(string $nombre);
    public function findByFechaInicio(string $fecha_inicio);
    public function findByFechaFin(string $fecha_fin);
}
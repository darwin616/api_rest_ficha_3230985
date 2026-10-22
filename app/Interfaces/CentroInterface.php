<?php

namespace App\Interfaces;

interface EventoCentroInterface extends BaseInterface 
{
    public function findByCode(int $codigo);
    public function findByName(string $nombre);
    public function findByRegion(string $regional);
    public function findByRegionAddress(string $direccion);
}


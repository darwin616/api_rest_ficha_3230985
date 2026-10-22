<?php

namespace App\Interfaces;

interface RolInterface extends BaseInterface
{
    public function findByName(string $nombre);
    public function findByDescription(string $descripcion);
}
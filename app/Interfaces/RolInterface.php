<?php

namespace App\Interfaces;

interface Roles extends BaseInterface
{
    public function findByName(string $nombre);
    public function findByDescription(string $descripcion);
}
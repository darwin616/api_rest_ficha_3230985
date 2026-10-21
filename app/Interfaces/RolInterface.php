<?php

namespace App\Interfaces;

interface Rol extends BaseInterface
{
    public function findByName(string $nombre);
    public function findByDescription(string $descripcion);
}
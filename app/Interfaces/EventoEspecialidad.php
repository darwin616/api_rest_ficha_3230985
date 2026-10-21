<?php

namespace App\Interface;

Interface EspecialidadInterface extends BaseInterface
{
    public function findByname(string $nombre, string $descripcion);
    
}
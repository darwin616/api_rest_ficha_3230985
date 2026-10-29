<?php

namespace App\Interfaces;

interface UsuarioInterface extends BaseInterface
{
    public function findByCorreo(string $correo);
    public function findByName(string $nombre);
    public function findByActive(bool $activo);
}

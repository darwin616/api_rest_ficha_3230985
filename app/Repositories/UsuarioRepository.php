<?php
namespace App\Repositories;

use App\Interfaces\UsuarioInterface;
use App\Models\Usuario;

class UsuarioRepository extends BaseRepository implements UsuarioInterface
{
    public function __construct(Usuario $usuario){
        parent::__construct($usuario);
    }
    public function findByCorreo(string $correo)
    {
        return $this->model->where("correo", "LIKE", "%{$correo}%")->get();
    }

    public function findByName(string $nombre)
    {
        return $this->model->where("nombre", "LIKE", "%{$nombre}%")->get();
    }

    public function findByActive(bool $activo)
    {
        return $this->model->where("activo", $activo)->get();
    }
}

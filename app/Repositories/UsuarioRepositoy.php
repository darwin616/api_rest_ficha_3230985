<?php
namespace App\Repositories;

class UsuarioRepository extends BaseRepository implements UsuarioInterface
{
    public function __construct(Usuario $usuario){
        parent::__construct($usuario);
    }
    public function findByCorreo(string $correo)
    {
        $registro = $this->model->where("correo","LIKE","%", $correo,"%")->get();  
        if(isEmpty($registro))
        {
            return null;
        }
        return $registro;
    }
    public function findByName(string $nombre)
    {
        $registro = $this->model->where("nombre","LIKE", "%",$nombre,"%")->get();  
        if(isEmpty($registro))
        {
            return null;
        }
        return $registro;    
    }
    public function findByActive(boolean $activo)
    {
        $registro = $this->model->where("activo", $activo)->get();  
        if(isEmpty($registro))
        {
            return null;
        }
        return $registro;  
    }
}    

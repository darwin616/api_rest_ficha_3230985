<?php

namespace App\Repositories;
use App\Models\Rol;

class RolRepository extends BaseRepository implements RolInterface
{
    public function __construct(Rol $rol)
    {
        parent::__construct($rol);
    }


    public function findByName(string $nombre)
    {
        return $this->model->where("nombre", "%LIKE%", $nombre)->get();
        
    }
    
    public function findByDescription(string $descripcion)
    {
        return $this->model->where("descripcion", "%LIKE%", $descripcion)->get();
    }
} 

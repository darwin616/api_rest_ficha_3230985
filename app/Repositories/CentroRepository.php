<?php

namespace App\Repositories;

use App\Model\Centro;

class CentroRepository extends BaseRepository implements CentroInterface
{
    public function __construct(Centro $centro)
    {
        parent::__construct($centro);
    }

    public function findByNameOrCode(string $codigo)
    {
        return $this->model->where("codigo", $codigo)
                            ->orWhere("nombre", $nombre)->get();
    }

    public function findByNameOrRegion(string $region)
    {
        return $this->model->where("regional", $region)->get();
    }

    public function findByNameOrDireccion(string $direccion)
    {
        return $this->model->where("direccion", $direccion)->get();
    }
    
}







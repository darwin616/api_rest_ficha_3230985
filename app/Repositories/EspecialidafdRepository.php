<?php
namespace App\Repositorires;

use App\Models\Especialidad;

class EspecialidadRepository extends BaseRepository implements EspecialidadInterface
{
public function __construct(Especialidad $especialidad)
{
    parent::__construct($especialidad);
}

public function findById(int $id)
{
    return $this->model->where("id", $id)->first();
}

public function findByName(string $nombre)
{
    return $this->model->where("nombre", "LIKE", "%" . $nombre . "%")->get();

}


public function findByDescription(string $descripcion)
{
    return $this->model->where("descripcion", "LIKE", "%" . $descripcion . "%")->get();

}
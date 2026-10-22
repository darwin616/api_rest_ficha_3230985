<?php

namespace App\Repositories;
use App\Models\Ambiente;



class AmbienteRepository extends BaseRepository implements AmbienteInterface
{
    public function __construct(Ambiente $ambiente)
    {
        parent::__construct($ambiente);
    }

    public function findByCode(string $codigo)
    {
        return $this->model->where("codigo", $codigo)->first();
    }
    public function findByName(string $name)
    {
        return $this->model->where("nombre","%LIKE%", $name)->get();
    }
    public function findByType(string $tipo)
    {
        return $this->model->where("tipo", $tipo)->get();
    }





}
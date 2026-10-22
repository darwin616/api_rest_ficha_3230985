<?php

namespace App\Repositories;
use App\Models\ProgramaFormacion;

class ProgramaFormacionRepository extends BaseRepository implements ProgramaFormacionRepository
{
    public function __construct(ProgramaFormacion $programaformacion)
    {
        parent::__construct($programaformacion);
    }

    public function finBycode(string $codigo)
    {
        return $this->model->where("codigo", $codigo)->first();
    }

    public function findByName(string $nombre)
    {
        return $this->model
        ->where("nombre", "LIKE", "%" . $nombre . "%")->get();
    }

   

    


    
}
    

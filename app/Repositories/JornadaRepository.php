<?php

namespace App\Repositories ;


use App\Models\Jornada;

class JornadaRepository extends BaseRepository implements JornadaInterface
{   

    public function _construct(Jornada $jornada)
    {
        parent ::__construct($jornada);
    }
    public function findBynombre(string $nombre)
    {
        return $this->model->where("nombre", $nombre)->get(); 
    }
    public function findByHora_inicio(string $hora_inicio)
    {
        return $this->model->where("Hora_inicio", $Hora_inicio)->get();
    }   
    public function findByHora_fin(string $Hora_fin)
    {
        return $this->model->where("Hora_fin", $Hora_fin)->get();
    }


}
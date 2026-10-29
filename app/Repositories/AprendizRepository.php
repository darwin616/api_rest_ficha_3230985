<?php

namespace\Repositories;

use App\Models\Aprendiz;


class AprendizRepository extends BaseRepository implements AprendizInterface
{

  public function __construct(Aprendiz $aprendiz)
  {
    parent::__construct($aprendiz);
  }

   public function findByName(string $nombre){
    return $this->model->where("nombre", $nombre)->get();
   }
   public function findBystate(string $estado){
    return $this->model->where("estado, $estado")->get();
   }
    
   public function findByEmail(string $email){
    return $this->model->where("email", "LIKE", "%" . $email. "%")->get();
   }



}
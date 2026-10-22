<?php

    
    namespace App\Repositories;
    use App\Model\Dia;

    class DiaRepository extends BaseRepository implements DiaInterface
    {

    public function __construct( Dia $dia) {
        parent::__construct($dia);
    }

    
        public function findByName(string $nombre){
            return $this->model->where("nombre", $nombre)->get();
        }
        public function findByOrder(string $orden){
            return $this->model->where("orden", $orden)->get();
        }

    }


?>
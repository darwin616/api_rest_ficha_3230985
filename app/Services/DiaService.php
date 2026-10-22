<?php

    namespace App\Services;
    use App\Interfaces\DiaInterface;

    class DiaService
    {
        protected DiaInterface $diarepositorio;

        public function __construct(DiaInterface $diarepositorio) {
            $this->diarepositorio = $diarepositorio;
        }
         public function getAll(){
        return $this->diarepositorio->all();  
    }


    public function getById(int $id){
        return $this->diarepositorio->getBiId($id);
    }

    public function create(array $data)
    {
        return $this->diarepositorio->create($data);
    }


     public function update(int $id, array $data)
     {
        return $this->diarepositorio->update($data);
     }

    public function delete(int $id)
    {
        return $this->diarepositorio->delete($id);
    }
    public function findByName(string $nombre){
        return $this->model->where("nombre", $nombre)->get();
    }
    public function findByOrder(string $orden){
        return $this->model->where("orden", $orden)->get();
    }

    }
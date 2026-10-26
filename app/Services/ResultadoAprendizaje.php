<?php

namespace App\services;

use App\Interfaces\ResultadoAprendizajeInterface;

class ResultadoAprendizajeServices
{
    protected ResultadoAprendizajeInterface $resultadoAprendizajeRepository;

    public function   __construct(ResultadoAprendizajeInterface $resultadoAprendizajeRepository) 
    {
        $this->resultadoAprendizajeRepository = $resultadoAprendizajeRepository;   
    }

      public function getAll(){
        return $this->resultadoaprendizajeRepository->getAll();  
    }

    public function getById(int $id){
       return $this->resultadoaprendizajeRepository->getById($id);  

    }

    public function create(array $data)
    {
        return $this->resultadoaprendizajeRepository->create($data); 
    }

     public function update(int $id, array $data)
     {
        return $this->resultadoaprendizajeRepository->update($id, $data);

     }

    public function delete(int $id)
    {
       return $this->resultadoaprendizajeRepository->delete($id);
    }

     public function finByHour(int $horas)
     {
        return $this->resultadoaprendizajeRepository($horas);
     }

     public function finByName(string $nombre)
     {
        return $this->resultadoaprendizajeRepository($nombre);    
     }

     public function finByCompetency(string $competencias)
     {
        return $this->resultadoaprendizajeRepository($competencias);
     }
}
<?php

namespace App\services;

use App\Interfaces\ResultadoAprendizajeInterface;

class ResultadoAprendizajeServices
{
    protected ResultadoAprendizajeInterface $resultadoaprendizajeRepository;

    public function   __construct(ResultadoAprendizajeInterface $resultadoaprendizajeRepository) 
    {
        $this->resultadoaprendizajeRepository = $resultadoaprendizajeRepository;   
    }

      public function getAll(){
        return $this->resultadoaprendizajeRepository->getAll();  
    }

    public function getById(int $id){
        $registro = $this->resultadoaprendizajeRepository->getById($id);  

    }

    public function create(array $data)
    {
        return $this->resultadoaprendizajeRepository->create($data); 
    }

     public function update(int $id, array $data)
     {
        return $this->resultadoaprendizajeRepository->update($data);

     }

    public function delete(int $id)
    {
       return $this->resultadoaprendizajeRepository->delete($id);
    }

     public function finByHour(int $horas)
     {
        return $this->finByHour($horas);
     }

     public function finByName(string $nombre)
     {
        return $this->finByName($nombre);    
     }

     public function finByCompetency(string $competencias)
     {
        return $this->finByCompetency($competencias);
     }
}
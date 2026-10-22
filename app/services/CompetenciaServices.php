<?php

namespace App\Services;
use App\Interfaces\CompetenciaInterface;

class CompetenciaServices 
{
    protected CompetenciaInterface $competenciaRepository;

    public function __construc(CompetenciaInterface $competenciaRepository)
    {
        return $this->competenciaRepository = $competenciaRepository;

    }

    public function getAll(){
        return $this->competenciaRepository->getAll();  
    }


    public function getById(int $id){
       return  $registro = $this->competenciaRepository->getById($id);  

    }

    public function create(array $data)
    {
        return $this->competenciaRepository->create($data); 
    }


     public function update(int $id, array $data)
     {
        return $registro = $this->competenciaRepository->update($id, $data);
     }

    public function delete(int $id)
    {
        return $registro = $this->competenciaRepository->delete($id);
       
    }

    //del repositorio 

    public function findByCode(int $codigo)
    {
    return $this->competenciaRepository->findByCode($codigo);
    }

     public function findByName(strign $nombre)
     {     
        return $this->competenciaRepository->findByName($nombre);
            
     }

        public function findByHour(int $horas)
    {
        return $this->competenciaRepository->findByHour($horas);
                            

    }

    public function findByHourAndName(int $horas, string $nombre)
    {
       $consulta = $this->competenciaRepository->findByHourAndName($horas, $nombre);

         if ($consulta->exists()) 
            {
                return $consulta;
             }

        return null;
    }  
}
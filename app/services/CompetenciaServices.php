<?php

namespace App\Services;
use App\Interfaces\CompetenciaInterface;

class CompetenciaServices 
{
    protected CompetenciaInterface $competenciarepository;

    public function __construc(CompetenciaInterface $competenciarepository)
    {
        $this->competenciarepository = $competenciarepository;

    }

    public function getAll(){
        return $this->competenciarepository->getAll();  
    }


    public function getById(int $id){
        $registro = $this->competenciarepository->getById($id);  

    }

    public function create(array $data)
    {
        return $this->competenciarepository->create($data); 
    }


     public function update(int $id, array $data)
     {
        $registro = $this->competenciarepository->update($id, $data);
     }

    public function delete(int $id)
    {
        $registro = $this->competenciarepository->delete($id);
       
    }

    //del repositorio 

    public function findByCode(int $codigo)
    {
    return $this->competenciarepository->findByCode($codigo);
    }

     public function findByName(strign $nombre)
     {     
        return $this->competenciarepository->findByName($nombre);
            
     }

        public function findByHour(int $horas)
    {
        return $this->competenciarepository->findByHour($horas);
                            

    }

    public function findByHourAndName(int $horas, string $nombre)
    {
       $consulta = $this->competenciarepository->findByHourAndName($horas, $nombre);

         if ($consulta->exists()) 
            {
                return $consulta;
             }

        return null;
    }  
}
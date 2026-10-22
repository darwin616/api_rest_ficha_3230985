<?php

namespace App\Services;

use App\Interfaces\AprendizInterface;

class AprendizService
{
    protected AprendizInterface $AprendizRepository;

    public function __construct(AprendizInterface  $AprendizRepository)
    {
      $this->AprendizRepository = $AprendizRepository;
    }

     public function getAll(){
         $this->AprendizRepository->getall();  
    }


    public function getById(int $id){
        return $this->AprendizRepository->getById($id);  

    }

    public function create(array $data)
    {
        return $this->AprendizRepository->create($data); 
    }


     public function update(int $id, array $data)
     {
        return $this->AprendizRepository->getById($id);
       
     }

    public function delete(int $id)
    {
        return $this->AprendizRepository->find($id);
       
    }

    public function findByName(string $nombre)
  {
    return $this->AprendizRepository->findByName($nombre);
  }

   
   public function findBystate(string $estado = 'activo'){
    return $this->AprendizRepository->findBystate( $estado);
   }
    
   public function findByEmail(string $email){
    return $this->AprendizRepository->findByEmail($email);
   }

}
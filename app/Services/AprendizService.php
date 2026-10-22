<?php

namespace App\Services;

use App\Interfaces\AprendizInterface;

class AprendizService
{
    protected AprendizInterface $aprendizRepository;

    public function __construct(AprendizInterface  $aprendizRepository)
    {
      $this->aprendizRepository = $aprendizRepository;
    }

     public function getAll(){
         $this->aprendizRepository->getAll();  
    }


    public function getById(int $id){
        return $this->aprendizRepository->getById($id);  

    }

    public function create(array $data)
    {
        return $this->aprendizRepository->create($data); 
    }


     public function update(int $id, array $data)
     {
        return $this->aprendizRepository->update($id , $data);
       
     }

    public function delete(int $id)
    {
        return $this->aprendizRepository->delete($id);
       
    }

    public function findByName(string $nombre)
  {
    return $this->aprendizRepository->findByName($nombre);
  }

   
   public function findBystate(string $estado){
   return $this->aprendizRepository->findBystate( $estado);
   }
    
   public function findByEmail(string $email){
    return $this->aprendizRepository->findByEmail($email);
   }

}
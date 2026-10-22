<?php

namespace App\Services;

use App\Interfaces\RolInterface;

class RolService
{
    protected RolInterface $rolRepository;

    public function __construct(RolInterface $rolRepository)
    {
        $this->rolRepository = $rolRepository;
    }


     public function getAll(){
        return $this->rolRepository->getAll();  
    }


    public function getById(int $id){
        return $this->rolRepository->getById($id);  
    }

    public function create(array $data)
    {
        return $this->rolRepository->create($data); 
    }


     public function update(int $id, array $data)
     {
       return $this->rolRepository->update($id, $data);
     }

    public function delete(int $id)
    {
        return $this->rolRepository->delete($id);
    }

    public function findByName(string $nombre)
    {
        return $this->rolByName($nombre);
        
    }
    
    public function findByDescription(string $descripcion)
    {
        return $this->rolByDescription($descripcion);
    }


}


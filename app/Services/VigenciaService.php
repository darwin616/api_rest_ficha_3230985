<?php

namespace App\Services;

use App\Interfaces\VigenciaInterface;

class VigenciaService
{
    protected VigenciaInterface $vigenciaRepository;



    public function __construct(VigenciaInterface $vigenciaRepository)
    {
        $this->vigenciaRepository = $vigenciaRepository;
    }

    public function getAll(){
        return $this->vigenciaRepository->getAll();
    }


    public function getById(int $id){
        return $this->vigenciaRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->vigenciaRepository->create($data);
    }


    
    public function update(int $id, array $data){
        return $this->vigenciaRepository->update($id, $data);
    }

    
    public function delete(int $id)
    {
        return $this->vigenciaRepository->delete($id);
    }

}
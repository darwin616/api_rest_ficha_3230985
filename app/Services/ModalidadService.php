<?php

namespace App\Services;

use App\Interfaces\ModalidadInterface;


class ModalidadService
{
    protected ModalidadInterface $modalidadRepository;

    public function __construct(ModalidadInterface $modalidadRepository)
    {
        $this->modalidadRepository = modalidadRepository;
    }

    public function getAll(){
        return $this->modalidadRepository->getAll();
    }

    public function getById(int $id){
        return $this->modalidadRepository->getById();
    }

    public function Create(array $data){
        return $this->modalidadRepository->create($data);
    }

    public function delete(array $id){
        return $this->modalidadRepository->delete($id);
    }


}
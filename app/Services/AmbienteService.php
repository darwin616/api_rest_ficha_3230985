<?php

namespace App\Services;


class AmbienteService
{
    protected AmbienteInterface $ambienteRepository;


    public function __construct(AmbienteInterface $ambienteRepository) 
    {
        $this->ambienteRepository = $ambienteRepository;    
    }

   
    
public function getAll()
    {
        $registro = $this->ambienteRepository->getAll();  
    }

    public function getByid(int $id)
    {
        return $this->ambienteRepository->getByid($id); 
    }

      public function create(array $data)
    {
        return $this->ambienteRepository->create($data); 
    }

     public function update(int $id, array $data)
    {
        $registro = $this->ambienteRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        $registro = $this->ambienteRepository->delete($id);
    }


    public function findByCode(string $codigo)
    {
        return $this->ambienteRepository->findByCode($codigo);
    }

    public function findByName(string $name)
    {
        return $this->ambienteRepository->findByName($name);
    }
    public function findByType(string $tipo)
    {
        return $this->ambienteRepository->findByType($tipo);

    }


}
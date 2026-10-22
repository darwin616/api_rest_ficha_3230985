<?php

namespace App\Services;

use App\Interfaces\FichaInterface;
use Carbon\Carbon;

class FichaService
{
    protected FichaInterface $fichaRepository;


    public function __construct(FichaInterface $fichaRepository)
    {
        $this->fichaRepository = $fichaRepository;
    }

     public function getAll()
    {
        return $this->fichaRepository->getAll();  
    }

    public function getByid(int $id)
    {
        return $this->fichaRepository->getByid($id); 
    }

      public function create(array $data)
    {
        return $this->fichaRepository->create($data); 
    }

     public function update(int $id, array $data)
    {
        return $this->fichaRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->fichaRepository->delete($id);
    }

    public function findByDate(Carbon $fechaInicio, Carbon $fechaFin)
    {
        if($fechaInicio<$fechaFin)
        {
            return false;
        }

        return $this->fichaRepository->findByDate($fechaInicio, $fechaFin);

    }

    public function findByNumber(string $numero)
    {
        return $this->fichaRepository->findByNumber($numero);
    }

    public function findByState(string $estado)
    {
        return $this->fichaRepository->findByState($estado);
    }

}
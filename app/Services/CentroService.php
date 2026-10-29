<?php

namespace App\Services;

use App\Interfaces\CentroInterface;

class CentroService
{
    protected CentroInterface $centroRepository;

    public function __construct(CentroInterface $centroRepository)
    {
        $this->centroRepository = $centroRepository;
    }

    public function getAll(){
        return $this->centroRepository->getAll();
    }

    public function getById(int $id){
        return $this->centroRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->centroRepository->create($data); 
    }


     public function update(int $id, array $data)
     {
        return $centroRepository->update($id, $data);
     }

    public function delete(int $id)
    {
        return $centroRepository->delete($id);
    }
    
    public function findByNameOrCode(string $codigo, string $nombre)
    {
        return $this->centroRepository->model()
        ->where('codigo', $codigo)
        ->orWhere('nombre', 'LIKE', "%{$nombre}%")
        ->get(); 
    }

     public function findByNameOrRegion(string $region)
    {
        return $this->centroRepository->findByNameOrRegion("regional", $region)->get();
    }

    public function findByNameOrDireccion(string $direccion)
    {
        return $this->centroRepository->findByNameOrDireccion("direccion", $direccion)->get();
    }

}
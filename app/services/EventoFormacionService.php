<?php

namespace App\services;
use App\Interfaces\EventoFormacionInterface;

class EventoFormacionService
{
    protected EventoFormacionInterface $eventoFormacionRepository;

    public function __constructor(EventoFormacionInterface $eventoFormacionRepository)
{
    $this->eventoFormacionRepository = eventoFormacionRepository;
}
     public function getAll(){
        return $this->eventoFormacionRepository->getAll();  
    }


    public function getById(int $id){
        return $this->eventoFormacionRepository->getById($id); 
    }

    public function create(array $data)
    {
        return $this->eventoFormacionRepository->create($data); 
    }


     public function update(int $id, array $data)
     {
        return $this->eventoFormacionRepository->update($id);
     }

    public function delete(int $id)
    {
        return  $this->eventoFormacionRepository->delete($id);
    }
     public function findByHour(int $horaInicio, int $horaFin){
        if($horaInicio<$horaFin){
            return false;
        }
        return $this->eventoFormacionRepository->findByHour($horaInicio,$horaFin);
    
     }
     public function findByDay(int $diaId)
     {
        return $this->eventoFormacionRepository->findByDay($diaId);
     }
      public function findByDate(carbon $fechaInicio, carbon $fechaFin )
      {
        if($fechaInicio<$fechaInicio)
            {
                return false;
            }
            return $this->eventoFormacionRepository->findByDate($fechaInicio,$fechaFin);

      }

}
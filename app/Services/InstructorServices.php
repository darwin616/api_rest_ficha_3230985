<?php

namespace App\Services;
use App\Interfaces\InstructorInterface;

class InstructorServices
{
    protected InstructorInterface $InstructorRepository;

    public function __construct(InstructorInterface $InstructorRepository)
    {
        $this->InstructorRepository = $InstructorRepository;
    }

    public function getAll(){
        return $this->InstructorRepository->getAll();
    }


    public function getById(int $id){
        return $this->InstructorRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->InstructorRepository->create($data);
    }


    public function update(int $id, array $data)
     {
        return $this->InstructorRepository->update($id, $data);

     }

    public function delete(int $id)
    {
        return $this->InstructorRepository->delete($id);

    }
    //Los servicios instructores
    public function findByNombre(string $nombre)
    {
        return $this->InstructorRepository->findByNombre($nombre);
    }

    public function findByApellido(string $apellido)
    {
        return $this->InstructorRepository->findByApellido($apellido);
    }

    public function findByTelefono(int $telefono)
    {
        return $this->InstructorRepository->findByTelefono($telefono);
    }

    public function findByCorreo(string $correo)
    {
        return $this->InstructorRepository->findByCorreo($correo);
    }

    public function findByUsuario(int $usuarioId)
    {
        return $this->InstructorRepository->findByUsuario($usuarioId);
    }

    public function findByCentro(int $centroId)
    {
        return $this->InstructorRepository->findByCentro($centroId);
    }

    public function findByEspecialidad(int $especialidadId)
    {
        return $this->InstructorRepository->findByEspecialidad($especialidadId);
    }

    public function findByCompetencia(int $competenciaId)
    {
        return $this->InstructorRepository->findByCompetencia($competenciaId);
    }

    public function findByTipoVinculacion(int $tipoVinculacionId)
    {
        return $this->InstructorRepository->findByTipoVinculacion($tipoVinculacionId);
    }

    public function findByActivo(boolean $activo)
    {
        return $this->InstructorRepository->findByActivo($activo);
    }

}
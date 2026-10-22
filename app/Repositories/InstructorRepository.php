<?php

namespace App\Repositories;
use App\Models\Instructor;

class InstructorRepository extends BaseRepository implements InstructorInterface
{
   public function __construct(Instructor $Instructor)
   {
       parent::__construct($Instructor);
   } 

   public function findByName(string $nombre)
   {
       return $this->model->where('nombre', "LIKE", "%" . $nombre . "%")->get(); //select * from instructores where nombre = $nombre 
   }

   public function findByApellido(string $apellido)
   {
       return $this->model->where('apellido', "LIKE", "%" . $apellido . "%")->get();
   }

   public function findByTelefono(int $telefono)
   {
       return $this->model->where('telefono', $telefono)->get();
   }

   public function findByCorreo(string $correo)
   {
       return $this->model->where('correo', $correo)->get();
   }

   public function findByUsuario(int $usuarioId)
   {
       return $this->model->where('usuario_id', $usuarioId)->get();
   }

   public function findByCentro(int $centroId)
   {
       return $this->model->where('centro_id', $centroId)->get();
   }

   public function findByEspecialidad(int $especialidadId)
   {
       return $this->model->where('especialidad_id', $especialidadId)->get();
   }

   public function findByCompetencia(int $competenciaId)
   {
       return $this->model->where('competencia_id', $competenciaId)->get();
   }

   public function findByTipoVinculacion(int $tipoVinculacionId)
   {
       return $this->model->where('tipo_vinculacion_id', $tipoVinculacionId)->get();
   }

   public function findByActivo(boolean $activo)
   {
       return $this->model->where('activo', $activo)->get();
   }
  // holas
}
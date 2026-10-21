<?php

namespace App\Interfaces;

interface InstructorInterface extends BaseInterface
{
    public function getActivos(boolean $activo);

    public function getByEspecialidad(int $especialidadId);

    public function getByUsuario(int $usuario_id);

    public function getByCentro(int $centroId);

    public function getByTipoVinculacion(int $tipoVinculacionId);

    public function getByCompetencia(int $competencia_id);

    public function findByCorreo(string $correo);

    public function findByNombre(string $nombre);

    public function findByApellido(string $apellido);

    public function findByTelefono(int $telefono);


}

<?php 
namespace App\Services;
use App\Interfaces\UsuarioInterface;

class UsuarioService
{
    protected UsuarioInterface $usuarioRepository;
    public function __construct(UsuarioInterface $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }
    public function getAll()
    {
        return $this->usuarioRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->usuarioRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->usuarioRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->usuarioRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->usuarioRepository->delete($id);
    }

    public function findByCorreo(string $correo)
    {
        return $this->usuarioRepository->findByCorreo($correo);
    }

    public function findByName(string $nombre)
    {
        return $this->usuarioRepository->findByName($nombre);
    }

    public function findByActive(bool $activo)
    {
        return $this->usuarioRepository->findByActive($activo);
    }
}
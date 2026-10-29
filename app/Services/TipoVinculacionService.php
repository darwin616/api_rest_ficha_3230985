<?php

namespace App\Services;

use App\Interfaces\TipoVinculacionInterface;

class TipoVinculacionService
{
    protected TipoVinculacionInterface $tipoVinculacionRepository;

    public function __construct(TipoVinculacionInterface $tipoVinculacionRepository)
    {
        $this->tipoVinculacionRepository = $tipoVinculacionRepository;
    }

    public function getAll()
    {
        return $this->tipoVinculacionRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->tipoVinculacionRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->tipoVinculacionRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->tipoVinculacionRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->tipoVinculacionRepository->delete($id);
    }

    public function findByName(string $nombre)
    {
        return $this->tipoVinculacionRepository->findByName($nombre);
    }
}
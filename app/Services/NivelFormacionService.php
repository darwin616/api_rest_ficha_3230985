<?php

namespace App\Services;

use App\Interfaces\NivelFormacionInterface;

class NivelFormacionService
{
    protected NivelFormacionInterface $nivelFormacionRepository;

    public function __construct(NivelFormacionInterface $nivelFormacionRepository)
    {
        $this->nivelFormacionRepository = $nivelFormacionRepository;
    }

    public function getAll()
    {
        return $this->nivelFormacionRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->nivelFormacionRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->nivelFormacionRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->nivelFormacionRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->nivelFormacionRepository->delete($id);
    }
}

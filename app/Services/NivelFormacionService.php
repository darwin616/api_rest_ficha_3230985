<?php

namespace App\Services;

use App\Interfaces\NivelFormacionInterface;

class NivelFormacionService
{
    protected NivelFormacionInterface $NivelFormacionRepository;

    public function __construct(NivelFormacionInterface $NivelFormacionRepository)
    {
        $this->NivelFormacionRepository = $NivelFormacionRepository;
    }

    public function getAll()
    {
        return $this->NivelFormacionRepository->getAll();
    }

    public function getById(int $id)
    {
        return $this->NivelFormacionRepository->getById($id);
    }

    public function create(array $data)
    {
        return $this->NivelFormacionRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->NivelFormacionRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->NivelFormacionRepository->delete($id);
    }
}

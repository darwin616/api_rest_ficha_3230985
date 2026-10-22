
<?php

namespace App\Services;

use App\Interfaces\TrimestreInterface;

class TrimestreService
{
    protected TrimestreInterface $trimestreRepository;

    public function __construct(TrimestreInterface $trimestreRepository)
    {
        $this->trimestreRepository = $trimestreRepository;
    }

    public function getAll()
    {
        return $this->trimestreRepository->all();
    }

    public function getByVigencia(int $vigencia_id)
    {
        return $this->trimestreRepository->findByVigencia($vigencia_id);
    }

    public function getByNumero(int $numero)
    {
        return $this->trimestreRepository->findByNumero($numero);
    }

    public function getByNombre(string $nombre)
    {
        return $this->trimestreRepository->findByNombre($nombre);
    }

    public function getByFechaInicio(string $fecha_inicio)
    {
        return $this->trimestreRepository->findByFechaInicio($fecha_inicio);
    }

    public function getByFechaFin(string $fecha_fin)
    {
        return $this->trimestreRepository->findByFechaFin($fecha_fin);
    }

    public function create(array $data)
    {
        return $this->trimestreRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->trimestreRepository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->trimestreRepository->delete($id);
    }
}

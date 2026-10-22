<?php

namespace App\Services;


class MallaTrimestralService
{
    protected MallaTrimestralInterface $mallaTrimestralRepository;

    public function __construct(MallaTrimestralInterface $mallaTrimestral)
    {
        $this->mallaTrimestralRepository = $mallaTrimestral;
    }

    public function getAll()
    {
        return $this->mallaTrimestralRepository->all();
    }

    public function findById(int $id)
    {
        return $this->mallaTrimestralRepository->find($id);
    }

    public function findByPrograma(int $programa_formacion_id)
    {
        return $this->mallaTrimestralRepository->findByPrograma($programa_formacion_id);
    }

    public function findByTrimestre(int $trimestre_id)
    {
        return $this->mallaTrimestralRepository->findByTrimestre($trimestre_id);
    }

    public function findByResultado(int $resultado_aprendizaje_id)
    {
        return $this->mallaTrimestralRepository->findByResultado($resultado_aprendizaje_id);
    }

    public function findByHora(int $horas_programadas)
    {
        return $this->mallaTrimestralRepository->findByHora($horas_programadas);
    }

    public function findByOrden(string $orden)
    {
        return $this->mallaTrimestralRepository->findByOrden($orden);
    }
}

<?php

namespace App\Repositories;

use App\Models\Trimestre;

class TrimestreRepository extends BaseRepository implements TrimestreInterface
{
    public function __construct(Trimestre $trimestre)
    {
        parent::__construct($trimestre);
    }

    public function findByVigencia(int $vigencia_id)
    {
        return $this->model->where("vigencia_id", $vigencia_id)->get();
    }

    public function findByNumero(int $numero)
    {
        return $this->model->where("numero", $numero)->get();
    }

    public function findByNombre(string $nombre)
    {
        return $this->model->where("nombre", "LIKE", "%{$nombre}%")->get();
    }

    public function findByFechaInicio(string $fecha_inicio)
    {
        return $this->model->where("fecha_inicio", $fecha_inicio)->get();
    }

    public function findByFechaFin(string $fecha_fin)
    {
        return $this->model->where("fecha_fin", $fecha_fin)->get();
    }
}

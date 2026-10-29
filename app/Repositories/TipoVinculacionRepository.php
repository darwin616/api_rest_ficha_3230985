<?php

namespace App\Repositories;

use App\Models\TipoVinculacion;
use App\Interfaces\TipoVinculacionInterface;

class TipoVinculacionRepository extends BaseRepository implements TipoVinculacionInterface
{
    protected $model;

    public function __construct(TipoVinculacion $model)
    {
        parent::__construct($model);
    }

    public function findByName(string $nombre)
    {
        return $this->model
            ->where("nombre", "LIKE", "%" . $nombre . "%")
            ->get();
    }
}
<?php

namespace App\Repositories;

use App\Models\NivelFormacion;


class NivelFormacionRepository extends BaseRepository implements NivelFormacionInterface
{
    public function __construct(NivelFormacion $nivelFormacion)
    {
        parent::__construct($nivelFormacion);
    }

}
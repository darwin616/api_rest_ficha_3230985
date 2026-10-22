<?php

namespace App\Repositories;

use App\Models\NivelFormacion;
use App\Interfaces\NivelFormacionInterface;

class NivelFormacionRepository extends BaseRepository implements NivelFormacionInterface
{
    public function __construct(NivelFormacion $nivelFormacion)
    {
        parent::__construct($nivelFormacion);
    }
}
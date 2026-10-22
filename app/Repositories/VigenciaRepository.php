<?php

namespace App\Repositories;

use App\Models\Vigencia;


class VigenciaRepository extends BaseRepository implements VigenciaInterface
{

    public function __construct(Vigencia $vigencia)
    {
        parent::__construct($vigencia);
    }

    


}
<?php

namespace App\Repositories;

use App\Models\Modalidad;

class ModalidadRepository extends BaseRepository implements ModalidadInterface
{
  public function __construct(Modalidad $modalidad)
  {
    parent::__construct($modalidad);
  }
}
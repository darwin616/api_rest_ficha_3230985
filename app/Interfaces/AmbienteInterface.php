<?php

namespace App\Interfaces;

interface AmbienteInterface extends BaseInterface 
{
    public function findByCode(string $codigo);
    public function findByName(string $name);
    public function findByType(string $tipo);

}
<?php

namespace\Interfaces;

interface EventoAprendizInterface extends BaseInterface
{
    public function findByName(string $name);
    public function findBystate(string $estado);
    public function findByEmail(string $email);
}
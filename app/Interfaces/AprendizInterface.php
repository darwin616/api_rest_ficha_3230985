<?php

namespace\Interfaces;

interface EventoAprendizInterface extends BaseInterface
{
    public function findByName(string $nombre);
    public function findBystate(string $estado);
    public function findByEmail(string $email);
}
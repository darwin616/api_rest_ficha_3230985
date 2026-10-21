<?php

namespace App\Interfaces;

interface BaseInterfaces
{
    public function getAll();
    public function getById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function dalete(int $id);
}
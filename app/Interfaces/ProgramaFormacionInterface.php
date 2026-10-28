<?php
namespace App\Interfaces;


interface ProgramaFormacionInterface extends BaseInterface
{
    public function findName(string $nombre);
    public function findCode(int $codigo);
    
}
<?php

namespace App\Services;

use App\Interfaces\ProgramaFormacionInterface;

class ProgramaFormacionService



{
    protected ProgramaFormacionInterface $programFormacionRepository;


    public function __construct(ProgramaFormacionInterface $programaFormacionRepository)

    {
        $this->programaformacionRepository = $programaformacionRepository;

    }
        public function getAll(){
        return $this->programaformacionRepository->getAll();  
    }

    public function finByName(string $nombre)
    {
        return $this->finByName($nombre);  
    }

     public function finBycode(string $codigo)
    {
        return $this->finBycode("codigo", $codigo);
    }



  
}
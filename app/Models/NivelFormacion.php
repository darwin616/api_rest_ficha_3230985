<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class NivelFormacion extends Model
{
    use HasFactory, softDeletes;

    protected $table = "niveles_formacion";
    
    protected $fillabe = [
        "nombre"
    ];

    public function ProgramaFormacion(){
        return $this->belongTo(ProgramaFormacion::class);
    } //1 


}

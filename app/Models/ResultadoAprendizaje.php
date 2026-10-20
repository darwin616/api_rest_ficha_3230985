<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;


class ResultadoAprendizaje extends Model
{
    use HasFactory, softDeletes;

    protected $table = "resultadoaprendizaje";

    protected $fillable= [
        'competencias_id',
        'codigo',
        'nombre',
        'horas'

    ];


public function competencias(){
    return $this->belongsTO(Competencias::class);

}
public function codigo(){
    return $this->belongsTO(codigo::class);
}

public function nombre(){
    return $this->belongsTO(Nombre::class);   
}

public function horas(){
    return $this->belongsTO(Horas::class);
}

}
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
}
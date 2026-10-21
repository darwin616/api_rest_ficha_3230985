<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Competencia extends Model
{
    USE HasFactory, SoftDeletes;

    protected $table ="competencias";
    
    protected $fillable= [
        'programa_formacion_id',
        'codigo',
        'nombre',
        'horas'
    ];

    public function programaformacion() {

        return $this->belongTo(ProgramaFormacion::class);
    }

    public function horas() {

        return $this->hasOne(Horas::class);
    }

    
}

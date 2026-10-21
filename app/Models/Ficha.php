<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;


class Ficha extends Model
{
    use HasFactory, softDeletes;

    protected $table = "ficha";
    
    protected $fillable= [
        'centro_id',
        'programa_formacion_id',
        'jornada_id',
        'numero',
        'fecha_inicio',
        'fecha_fin',
        'cupo',
        'estado'
    ];


    public function centro(){
        return $this->belongsTo(centro::class);
    } 
    
    public function programaFormacion(){
        return $this->belongsTo(ProgramaFormacion::class);
    }    

    public function jornada(){
        return $this->belongsTo(Jornada::class);
    }

    public function aprendiz(){
        return $this->hasMany(Aprendiz::class);
    }

    public function programaTrimestral(){
        return $this->hasMany(ProgramaTrimestral::class);
    }
}

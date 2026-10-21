<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;


class ResultadoAprendizaje extends Model
{
    use HasFactory, softDeletes;

    protected $table = "resultados_aprendizaje";

    protected $fillable= [
        'id',
        'competencias_id',
        'codigo',
        'nombre',
        'horas'

    ];


    public function competencia(){
    return $this->belongsTo(Competencia::class);

}
   public function mallaTrimestral(){
    return $this->hasMany(MallaTrimestral::class);

}

 public function eventoFormacion(){
    return $this->hasMany(EventoFormacion::class);
 }

}
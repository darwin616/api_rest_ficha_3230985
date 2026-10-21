<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MallaTrimestral extends Model 
{
    use HasFactory, SoftDeletes;
    //ddhs
    protected $table = "mallas_trimestrales";
    
    protected $fillable = [
        'programa_formacion_id',
        'trimestre_id',
        'resultado_aprendizaje_id',
        'horas_programadas',
        'orden'
    ];

    public function programaFormacion(){
        return $this->belongsTo(ProgramaFormacion::class, 'programa_formacion_id'); 
    }

    public function trimestre(){
        return $this->hasMany(Trimestre::class, 'trimestre_id');
    }

    public function resultadoAprendizaje(){
        return $this->hasMany(ResultadoAprendizaje::class, 'resultado_aprendizaje_id');  
    }
}

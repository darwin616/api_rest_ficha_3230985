<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class EventoFormacion extends Model
{
    use HasFactory, softDelete;
    protected $table = "eventos_formacion";
    protected $fillable = [
         'programacion_trimestral_id',
         'resultado_aprendizaje_id',
         'instructor_id',
         'ambiente_id',
         'dia_id',
         'hora_inicio',
         'hora_fin',
         'fecha_inicio',
         'fecha_fin'
    ];

    public function programacionTrimestral(){
    return $this->hasMany(ProgramacionTrimestral::class);
}
   public function resultadosAprendizaje(){
    return $this->hasMany(ResultadosTrimestral::class);
   }
   public function intructores(){
    return $this->hasMany(Intructores::class);
   }
   public function ambientes(){
    return $this->hasMany(Ambientes::class);
   }
   public function dias(){
    return $this->hasMany(Dias::class);
   }


}


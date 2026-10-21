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
    return $this->belongsTo(ProgramacionTrimestral::class);
}
   public function resultadoAprendizaje(){
    return $this->belongsTo(ResultadoTrimestral::class);
   }
   public function intructor(){
    return $this->belongsTo(Intructor::class);
   }
   public function ambiente(){
    return $this->belongsTo(Ambiente::class);
   }
   public function dia(){
    return $this->belongsTo(Dia::class);
   }
}


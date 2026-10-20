<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\EloqueNT\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class ProgramaFormacion extends Model
{
    use HasFactory, softDeletes;

    protected $table = "programas_formacion";

    protected $fillable= [
        'centro_id',
        'nivel_formacion_id',
        'modalidad_id',
        'codigo',
        'version',
        'nombre',
        'duracion_horas',
        'activo',
    ];
        public function centro(){
            return $this->belongsTo(Centro::class);
        }
 }
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//datos de prueba 
use Illuminate\Database\Eloquent\Factories\HasFactory;
//borrador logico
use Illuminate\Database\Eloquent\SoftDeletes;

class Instructor extends Model
{
    protected $table = "instructores";
    protected $filable= [
        "usuario_id",
        "centro_id",
        "tipo_vinculacion_id",
        "especialidades_id",
        "competencia_id",
        "nombre",
        "apellidos",
        "telefono",
        "correo",
        "activo"
    ];

    public function centro(){
      return $this-> belongsTo(Centro::class);
    }
    public function usuario(){
      return $this-> belongsTo(Usuario::class);
    }
    public function tipoVinculacion(){
      return $this-> belongTo(TipoVinculacion::class);
    }
    public function especialidades(){
      return $this-> belongTo(Especialidades::class);
    }
    public function competencia(){
      return $this-> belongTo(Competencia::class);
    }
}

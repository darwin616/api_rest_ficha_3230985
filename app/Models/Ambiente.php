<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ambiente extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "ambientes";
    protected $fillable = [
    'centro_id',
    'especialidad_id',
    'codigo',
    'nombre',
    'tipo',
    'capacidad',
    'activo'
    ];


    public function centro(){
        return $this->belongsTo(Centro::class);
    }

     public function especialidad(){
        return $this->belongsTo(Especialidad::class);
    }

 

}

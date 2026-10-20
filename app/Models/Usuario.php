<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    protected $table = "usuarios";
    protected $fillable = [
        "rol_id",
        "nombre",
        "correo",
        "password",
        "activo"
    ];
    public function rol(){
        return $this->belongTo(Rol::class);
    }
}

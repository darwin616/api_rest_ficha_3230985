<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;

    protected $table = "usuarios";

    protected $fillable = [
        "rol_id",
        "nombre",
        "correo",
        "password",
        "activo"
    ];

    protected $hidden = [
        "password",
    ];

    protected function casts(): array
    {
        return [
            "activo" => "boolean",
            "password" => "hashed",
        ];
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function aprendiz()
    {
        return $this->hasOne(Aprendiz::class);
    }

    public function instructor()
    {
        return $this->hasOne(Instructor::class);
    }
}

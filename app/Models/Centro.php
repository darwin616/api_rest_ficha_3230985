<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Centro extends Model
{
    protected $table = "centros";
    protected $fillabe=[
        "codigo",
        "nombre",
        "regional",
        "direccion"
    ];

    public function ProgramaFormacion(){
        return $this->hasMany(ProgramaFormacion::class);
    }

    public function Ambiente(){
        return $this->hasMany(Ambiente::class);
    }

    public function Instructor(){
        return $this->hasMany(Instructor::class);
    }

}

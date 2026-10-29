<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;



class Especialidad extends Model
{
    use HasFactory, softDeletes;
    protected $table = "especialidades";
    protected $fillable=[

        "nombre",
        "descrpcion"

    ];

    public function ambiente(){
        return $this->hasMany(Ambiente::class);
    }

}

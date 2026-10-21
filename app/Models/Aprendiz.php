<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDelete;

class Aprendiz extends Model
{
    use HasFactory;
    protected $table = "aprendices";
    
    protected $fillable= [
        'usuario_id',
        'ficha_id',
        'nombres',
        'apellidos',
        'correo',
        'estado'
        

    ];

    public function usuario(){
        return $this->belongsTo("Usuario"::class);
    }

    public function ficha(){
        return $this->belongsTo("Ficha"::class); 
    }
}

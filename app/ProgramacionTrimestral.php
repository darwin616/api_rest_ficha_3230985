<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramacionTrimestral extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "programacion_trimestral";

    protected $fillable= [
        "ficha_id",
        "trimestre_id",
        "estado"
    ];

    public function ficha(){
        return $this->belongsTo(ficha::class);
    }

    public function trimestre(){
        return $this->belongsTo(trimestre::class);
    }
}

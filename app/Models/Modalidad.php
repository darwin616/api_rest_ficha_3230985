<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modalidad extends Model
{
    protected $table = "modalidades";

    protected $fillable = [
        'nombre'
    ];
    
 
    public function programaFormacion() {

        return $this->hasMany(ProgramaFormacion::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoVinculacion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "tipos_vinculacion";
     
    protected $fillable=[
    'nombre'
    ];

    public function instructor(){
        return $this->hasMany(Instructor::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class Dia extends Model
{
    use HasFactory, softDeletes;

    protected $table = "dias";

    protected $fillable = [
        'nombre',
        'orden'
    ];

}

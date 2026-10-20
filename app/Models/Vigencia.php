<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vigencia extends Model
{
    use HasFactory, SoftDeletes;

     protected $table = "vigencias";
   
     protected $fillable= [
        
     'anio'

    ];


    public function trimestre(){
        return $this->belongTo(Trimestre::class);
    }





}

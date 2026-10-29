<?php

use Illuminate\Support\Facades\Route;


//http://localhost::8000/api/v1/modalidad

//get, post, put, patch, delete
Route::prefix('v1')->group(function(){
    Route::apiResource('modalidad',ModalidadController::class);
});



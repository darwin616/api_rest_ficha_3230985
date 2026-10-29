<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VigenciaController;



Route::prefix('v1')->group(function(){
    Route::apiResource('vigencia',VigenciaController::class);
});


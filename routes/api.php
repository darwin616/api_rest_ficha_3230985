<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompetenciaController;

Route::prefix('v1')->group(function () {

    Route::apiResource('competencia', CompetenciaController::class);

    Route::get('competencia/buscar/nombre/{name}', 
    [ CompetenciaController::class,'findByName']);

    Route::get('competencia/buscar/codigo/{codigo}', 
    [CompetenciaController::class,'findByCode']);

    Route::get('competencia/buscar/horas/{horas}', 
    [CompetenciaController::class,'findByHour']);

    Route::get('competencia/buscar/horas/{horas}/nombre/{nombre}', 
    [CompetenciaController::class,'findByHourAndName']);
});
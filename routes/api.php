<?php
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function(){
    Route::apiResource('ambiente',AmbienteController::class);
    Route::get('ambiente/name/{nombre}', [AmbienteController::class, 'findByName']);
    Route::get('ambiente/code/{codigo}', [AmbienteController::class, 'findByCode']);
    Route::get('ambiente/type/{tipo}', [AmbienteController::class, 'findByType']);
});



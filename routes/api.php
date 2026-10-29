<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoFormacionController;
Route::prefix('v1')->group(function(){
Route::apiResourece('EventoFormacion',EventoFormacionController::class);
Route::findByHour('EventoFormacion/hora/{horaInicio}/{horaFin}',[EventoFormacionController::class,findByHour]);
Route:findByDay('EventoFormacion/dia/{diaId}',[EventoFormacionController::class,findByDay]);
Route::findByDate('EventoFormacion/fecha/{fechaInicio}/{fechaFin}',[EventoFormacionController::class,findByDate]);
});



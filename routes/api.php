<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoFormacionController;
Route::prefix('v1')->group(function(){
Routes::apiResourece('EventoFormacion',EventoFormacionController::class);
})



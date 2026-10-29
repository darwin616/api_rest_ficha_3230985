<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::prefix('v1')->group(function () {
    Route::apiResource('usuarios', UsuarioController::class);
    Route::get('usuarios/correo/{correo}', [UsuarioController::class, 'findByCorreo']);
    Route::get('usuarios/nombre/{name}', [UsuarioController::class, 'findByName']);
    Route::get('usuarios/activo/{activo}', [UsuarioController::class, 'findByActive']);
});



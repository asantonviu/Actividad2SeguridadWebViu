<?php

use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RestAuthController;
use App\Http\Middleware\CheckUserRol;
use Illuminate\Support\Facades\Route;

Route::prefix('seguridadweb')->group(function () {
    Route::post('loginAPI', [RestAuthController::class, 'login']);
    // Rutas protegidas (requieren autenticación)
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('infoAPI', [InfoUserController::class, 'indexJSON'])->middleware([CheckUserRol::class . ':admin']);
        Route::get('infoUserAPI', [InfoUserController::class, 'infoUserJSON'])->middleware([CheckUserRol::class . ':admin,guest']);
        Route::post('logoutAPI', [RestAuthController::class, 'logout'])->middleware('auth:sanctum');
    });    
});
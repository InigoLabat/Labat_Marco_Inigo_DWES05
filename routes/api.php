<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AtletasController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Tambien podriamos definir las rutas como se muestra en los videos con 
// Route::get('atletas', 'App\Http\Controllers\AtletasController@getAll');

Route::get('atletas', [AtletasController::class, 'getAll']);
Route::get('atletas/{id}', [AtletasController::class, 'getById']);
Route::get('atletas/club/{id}', [AtletasController::class, 'getByClubId']);
Route::post('atletas', [AtletasController::class, 'create']);
Route::put('atletas/{id}', [AtletasController::class, 'update']);
Route::delete('atletas/{id}', [AtletasController::class, 'delete']);
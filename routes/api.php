<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\EspecialidadController;



////////especialidades//////////
Route::get('/especialidades', [EspecialidadController::class, 'index']);
Route::post('/especialidades', [EspecialidadController::class, 'store']);
////////especialidades//////////

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

/////medicamentos////////////////
Route::get('/medicamentos', [MedicamentoController::class, 'listado'])->name('index_medicamentos');
Route::get('/medicamentos/formulario/{id?}', [MedicamentoController::class, 'formulario']);
Route::post('/medicamentos/operaciones', [MedicamentoController::class, 'operaciones']);
Route::get('/medicamentos/imagen/{nombre}', [MedicamentoController::class, 'mostrar_imagen']); 
Route::get('/categorias', [MedicamentoController::class, 'categorias']);

/////medicamentos////////////////

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

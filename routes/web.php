<?php

use App\Http\Controllers\Api\DoctorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FakerController;
use App\Http\Controllers\SuscripcionController;

Route::get('/faker', [FakerController::class, 'generarDatos']);
Route::get('/faker-medicamentos', [FakerController::class, 'generarMedicamentosFake']);
Route::get('/dashboard-farmacia', [FakerController::class, 'dashboardFarmacia']);
Route::get('/generar-caducidad', [FakerController::class, 'generarCaducidadDemo']);
Route::get('/faker-suscripciones', [SuscripcionController::class, 'faker']);
Route::get('/', function () {
    return view('welcome');
});


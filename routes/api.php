<?php

use App\Http\Controllers\DoctorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/doctores',[DoctorController::class,'index']);
Route::post('/doctores',[DoctorController::class,'store']);
Route::put('/doctores/{id}',[DoctorController::class,'update']);
Route::delete('/doctores/{id}',[DoctorController::class,'destroy']);

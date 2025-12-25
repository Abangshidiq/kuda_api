<?php

use App\Http\Controllers\JenisKudaController;
use App\Http\Controllers\DataKudaController;

Route::get('/jeniskuda', [JenisKudaController::class, 'index']);
Route::post('/jeniskuda', [JenisKudaController::class, 'store']);
Route::get('/jeniskuda/{id}', [JenisKudaController::class, 'show']);
Route::put('/jeniskuda/{id}', [JenisKudaController::class, 'update']);
Route::delete('/jeniskuda/{id}', [JenisKudaController::class, 'destroy']);

Route::get('/datakuda', [DataKudaController::class, 'index']);
Route::post('/datakuda', [DataKudaController::class, 'store']);
Route::get('/datakuda/{id}', [DataKudaController::class, 'show']);
Route::post('/datakuda/{id}', [DataKudaController::class, 'update']); 
Route::delete('/datakuda/{id}', [DataKudaController::class, 'destroy']);

<?php

use App\Http\Controllers\AprendizController;
use App\Http\Controllers\AprendizMongoController;
use Illuminate\Support\Facades\Route;

Route::apiResource('aprendiz', AprendizController::class);
Route::apiResource('aprendiz-mongo', AprendizMongoController::class);

/*
Route::get('/api/aprendiz',           [AprendizController::class, 'index']);
Route::post('/api/aprendiz',          [AprendizController::class, 'store']);
Route::get('/api/aprendiz/{aprendiz}',[AprendizController::class, 'show']);
Route::put('/api/aprendiz/{aprendiz}',[AprendizController::class, 'update']);
Route::delete('/api/aprendiz/{aprendiz}',[AprendizController::class, 'destroy']);
*/

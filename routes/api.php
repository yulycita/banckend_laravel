<?php

use App\Http\Controllers\AprendizController;
use Illuminate\Support\Facades\Route;

Route::apiResource('aprendiz', AprendizController::class);
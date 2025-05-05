<?php

use App\Http\Controllers\ControladorDatosSensor;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->post('/sensores', [ControladorDatosSensor::class, 'store']);

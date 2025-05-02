<?php

use App\Http\Controllers\ControladorDatosSensor;
use Illuminate\Support\Facades\Route;

Route::post('/sensores', [ControladorDatosSensor::class, 'store']);

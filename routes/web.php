<?php

use App\Http\Controllers\Inicio;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Registro;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [Login::class, 'showLogin'])->name('login');
Route::post('/login', [Login::class, 'authenticate']);

Route::get('/registro', [Registro::class, 'showRegister'])->name('registro');
Route::post('/registro', [Registro::class, 'register']);

Route::get('/Inicio', function () {
    return view('Inicio');
})->middleware('auth');

Route::post('/logout', [Inicio::class, 'logout'])->name('logout');

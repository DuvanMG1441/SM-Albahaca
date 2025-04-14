<?php

use App\Http\Controllers\Inicio;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Registro;
use App\Http\Controllers\Proyecto;
use App\Http\Controllers\Perfil;

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


Route::get('/AcercaDe', function () {
    return view('acerca');
})->middleware('auth');

Route::get('/Proyecto', function () {
    return view('proyecto');
})->middleware('auth');

Route::get('/Proyecto', [Proyecto::class, 'index'])->name('proyecto.index');
Route::post('/Proyecto', [Proyecto::class, 'guardar'])->name('cultivo.guardar');
Route::delete('/Proyecto/{id}', [Proyecto::class, 'destroy'])->name('proyecto.eliminar');
Route::put('/proyectos/{id}/actualizar', [Proyecto::class, 'update'])->name('proyecto.actualizar');
Route::get('/cultivo/{id}/datos', [Proyecto::class, 'obtenerDatos'])->name('cultivo.datos');


Route::middleware(['auth'])->group(function () {
    Route::get('/Perfil', [Perfil::class, 'edit'])->name('perfil.editar');
    Route::put('/Perfil', [Perfil::class, 'update'])->name('perfil.actualizar');
    Route::delete('/Perfil/{user}', [Perfil::class, 'destroy'])->name('perfil.eliminar');



});

Route::post('/logout', [Inicio::class, 'logout'])->name('logout');

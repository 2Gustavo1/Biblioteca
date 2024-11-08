<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AutorController;

Route::get('/', function () {
    return view('welcome');
});

// modificacion de las rutas  principales para indetificar el controlador
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [LibroController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [AutorController::class, 'index'])->name('dashboard'); 
         
});
// Recurso para libros (CRUD completo)
Route::resource('libros', LibroController::class);  
Route::resource('autores', AutorController::class);
 


//Route::get('/libros/ver', [LibroController::class, 'ver'])->name('libros.ver');
//Route::get('/autores/ver', [AutorController::class, 'ver'])->name('autores.ver');
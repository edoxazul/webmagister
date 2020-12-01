<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ListaAcademicos;
use App\Http\Livewire\ListaAlumnos;
use App\Http\Livewire\ListaNoticias;
use App\Http\Livewire\InfoMag;
use App\Http\Livewire\ListaAcademicosPublico;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Publico
Route::get('/', function () {
    return view('welcome');
});


Route::get('/academic', function () {
    return view('lista-academicos-publico',ListaAcademicosPublico::class);
})->name('listaacademicospublico');

//Administrador

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/register', function () {
    return view('auth.register');
})->name('register');

// Route::middleware(['auth:sanctum', 'verified'])->get('/academicos', function () {
//     return view('academicos');
// })->name('academicos');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/academicos', ListaAcademicos::class)
    ->name('academicos');
//Noticias
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/noticias', ListaNoticias::class)
    ->name('noticias');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/alumnos', ListaAlumnos::class)
    ->name('alumnos');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/informacion-general', InfoMag::class)
    ->name('informacion');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ListaAcademicos;
use App\Http\Livewire\ListaAlumnos;
use App\Http\Livewire\ListaNoticias;
use App\Http\Livewire\InfoMag;
use App\Http\Livewire\InfoMagisterPublico;
use App\Http\Livewire\ListaAcademicosPublico;
use App\Http\Livewire\ListaAlumnosPublico;
use App\Http\Livewire\ListaNoticiasPublico;
use App\Http\Livewire\VistaNoticias;
use App\Http\Livewire\SubirArchivos;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;



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
//Para vistas públicas
Route::get('/informacion',InfoMagisterPublico::class )->name('infomagisterpublico');
Route::get('/academic',ListaAcademicosPublico::class )->name('listaacademicospublico');
Route::get('/alumn',ListaAlumnosPublico::class )->name('listaalumnospublico');
Route::get('/noticia',ListaNoticiasPublico::class )->name('listanoticiaspublico');
//Vista específica de una noticia
Route::get('/ver-noticia/{id}', [VistaNoticias::class,'ver'])->name('ver-noticia');
// Route::get('/ver-noticia/{noticia}',VistaNoticias::class)->name('ver-noticia');


//Administrador

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware(['auth']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/academicos', function () {
//     return view('academicos');
// })->name('academicos');

//Módulo Académicos
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/academicos', ListaAcademicos::class)
    ->name('academicos');
// Módulo Noticias
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/noticias', ListaNoticias::class)
    ->name('noticias');
// Módulo Alumnos
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/alumnos', ListaAlumnos::class)
    ->name('alumnos');
// Módulo Información General
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/informacion-general', InfoMag::class)
    ->name('informacion');
// Módulo Carga Archivos (solo administrador)
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/carga-archivos', SubirArchivos::class)
    ->name('archivos');


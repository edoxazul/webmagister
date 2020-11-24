<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ListaAcademicos;



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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->get('/register', function () {
//     return view('auth.register');
// })->name('register');

// Route::middleware(['auth:sanctum', 'verified'])->get('/academicos', function () {
//     return view('academicos');
// })->name('academicos');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/academicos', ListaAcademicos::class)
    ->name('academicos');

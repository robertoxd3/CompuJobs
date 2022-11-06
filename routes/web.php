<?php

use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HabilidadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\TrabajoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfertaController;
use App\Models\Habilidad;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    Route::resource('capacitaciones', CapacitacionController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('habilidades', HabilidadController::class);
    Route::resource('idiomas', IdiomaController::class);
    Route::resource('publicacion', PublicacionController::class);
    Route::resource('trabajos', TrabajoController::class);
    Route::resource('usuarios', UserController::class);
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/publicaciones', [PublicacionController::class, 'index'])->name('publicaciones');
    Route::get('/profesionales', [UserController::class, 'profesionales'])->name('profesionales');
    Route::get('perfil/{id}', [UserController::class, 'perfil'])->name('perfil');
    Route::get('puntuar/{id}', [HabilidadController::class, 'puntuar'])->name('puntuar');
    Route::get('/ranking', [HabilidadController::class, 'ranking'])->name('ranking');
    Route::get('seguir/{id}/{idseguido}', [UserController::class, 'seguir'])->name('seguir');
    Route::resource('oferta', OfertaController::class);

    // Admin
    Route::get('/infoPie', [CategoriaController::class, 'getDataPie']);
    Route::get('/cv/{id}', [UserController::class, 'reportRequest']);
});
Auth::routes();

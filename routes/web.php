<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

Route::prefix('usuario')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/listar', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/cancelar', [UsuarioController::class, 'index']);
    Route::get('/incluir', [UsuarioController::class, 'incluir'])->name('usuarios.incluir');
    Route::post('/incluir', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::get('/alterar/{id}', [UsuarioController::class, 'alterar'])->name('usuarios.alterar');
    Route::post('/alterar/{id}', [UsuarioController::class, 'update'])->name('usuarios.alterar');
    Route::get('/excluir/{id}', [UsuarioController::class, 'excluir']);
    Route::post('/delete/{id}', [UsuarioController::class, 'delete'])->name('usuarios.delete');
});

Route::post('/photo/upload', [PhotoController::class, 'saveImage'])->name('uploadImage');
Route::post('/photo/cancel', [PhotoController::class, 'removeImage'])->name('removeImage');

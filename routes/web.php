<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/usuario/listar', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuario/incluir', [UsuarioController::class, 'incluir']);
Route::post('/usuario/incluir', [UsuarioController::class, 'create']);
Route::get('/usuario/cancelar', [UsuarioController::class, 'index']);
Route::get('/usuario/alterar/{id}', [UsuarioController::class, 'alterar']);
Route::post('/usuario/alterarUsuario/{id}', [UsuarioController::class, 'alterarUsuario']);
Route::get('/usuario/excluir/{id}', [UsuarioController::class, 'excluir']);
Route::post('/usuario/remover/{id}', [UsuarioController::class, 'remover'])->name('usuarios.remover');

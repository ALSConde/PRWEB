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

Route::get('/usuario/listar', [UsuarioController::class, 'index']);
Route::get('/usuario/criarUsuario', [UsuarioController::class, 'criarUsuario']);
Route::post('/usuario/inserir', [UsuarioController::class, 'inserir']);

Route::get('/usuario/mostrar', [UsuarioController::class, 'mostrar']);
Route::post('/usuario/alterar', [UsuarioController::class, 'alterar']);

Route::get('/usuario/deletar', [UsuarioController::class, 'deletar']);
Route::post('/usuario/excluir', [UsuarioController::class, 'excluir']);

Route::get('/usuario/consultar', [UsuarioController::class, 'consultar']);

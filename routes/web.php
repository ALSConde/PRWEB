<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->middleware('web');
Route::get('/home', [HomeController::class, 'index']);

Route::prefix('usuario')->group(function () {
    Route::any('/', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::any('/listar', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/cancelar', [UsuarioController::class, 'index']);
    Route::get('/incluir', [UsuarioController::class, 'incluir'])->name('usuarios.incluir');
    Route::post('/incluir', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::get('/alterar/{id}', [UsuarioController::class, 'alterar'])->name('usuarios.alterar');
    Route::post('/alterar/{id}', [UsuarioController::class, 'update'])->name('usuarios.alterar');
    Route::get('/excluir/{id}', [UsuarioController::class, 'excluir']);
    Route::post('/delete/{id}', [UsuarioController::class, 'delete'])->name('usuarios.delete');

    Route::post('role/{id}', [UsuarioController::class, 'role'])->name('usuario.role');
    Route::post('role/salvar', [UsuarioController::class, 'saveRole'])->name('usuario.role.salvar');
    Route::post('role/excluir', [UsuarioController::class, 'destroyRole'])->name('usuario.role.excluir');
});

Route::prefix('role')->group(function () {

    Route::post('/permissao/salvar', [RolePermissionController::class, 'salvarRolePermissao'])->name('role.permissao.salvar');
    Route::post('/permissao/excluir/{role_id/permissao_id/action_id}', [RolePermissionController::class, 'excluirRolePermissao'])->name('role.permissao.excluir');

    Route::get('/permissao/{id}', [RolePermissionController::class, 'showPermissoes'])->name('role.index');
});

Route::prefix('autor')->group(function () {
    Route::any('/', [AutorController::class, 'index'])->name('autor.index');
    Route::get('/create', [AutorController::class, 'create'])->name('autor.create');
    Route::post('/store', [AutorController::class, 'store'])->name('autor.store');
    Route::get('/edit/{id}', [AutorController::class, 'edit'])->name('autor.edit');
    Route::post('/update/{id}', [AutorController::class, 'update'])->name('autor.update');
    Route::get('/delete/{id}', [AutorController::class, 'delete'])->name('autor.delete');
    Route::post('/destroy/{id}', [AutorController::class, 'destroy'])->name('autor.destroy');
    Route::get('/cancelar', [AutorController::class, 'index'])->name('autor.cancelar');
    Route::get('/livros/{id}', [AutorController::class, 'livrosPorAutor'])->name('autor.livros');
    Route::get('/export/{extensao}', [AutorController::class, 'export'])->name('autor.export');
    Route::get('/exportar', [AutorController::class, 'exportar'])->name('autor.exportar');
});

Route::post('/photo/upload', [PhotoController::class, 'uploadImage'])->name('uploadImage');
Route::post('/photo/cancel', [PhotoController::class, 'removeImage'])->name('removeImage');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsuarioRestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('usuario')->group(function () {
    Route::any('/listar', [UsuarioRestController::class, 'index']);
    Route::post('/incluir', [UsuarioRestController::class, 'create']);
    Route::put('/alterar/{id}', [UsuarioRestController::class, 'update']);
    Route::post('/delete/{id}', [UsuarioRestController::class, 'delete']);
    Route::get('/show/{id}', [UsuarioRestController::class, 'show']);
});

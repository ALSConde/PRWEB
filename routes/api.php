<?php

use App\Http\Controllers\Api\AuthRestController;
use App\Http\Controllers\Api\AutorRestController;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthRestController::class, 'login']);
    Route::post('logout', [AuthRestController::class, 'logout']);
    Route::post('refresh', [AuthRestController::class, 'refresh']);
    Route::post('me', [AuthRestController::class, 'me']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('usuario')->group(function () {
    Route::any('/listar', [UsuarioRestController::class, 'index']);
    Route::post('/incluir', [UsuarioRestController::class, 'create']);
    Route::put('/alterar/{id}', [UsuarioRestController::class, 'update']);
    Route::delete('/delete/{id}', [UsuarioRestController::class, 'delete']);
    Route::get('/show/{id}', [UsuarioRestController::class, 'show']);
})->middleware('jwt.auth');

Route::prefix('autor')->group(function () {
    Route::any('/listar', [AutorRestController::class, 'index']);
    Route::any('/index', [AutorRestController::class, 'index']);
    Route::post('/create', [AutorRestController::class, 'create']);
    Route::post('/store', [AutorRestController::class, 'store']);
    Route::put('/update/{id}', [AutorRestController::class, 'update']);
    Route::delete('/delete/{id}', [AutorRestController::class, 'delete']);
    Route::get('/show/{id}', [AutorRestController::class, 'show']);
})->middleware('jwt.auth');

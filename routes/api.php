<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChatController;

use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\AlexaController;
use App\Http\Controllers\TerapeutaApiController;
use App\Http\Controllers\AgendaController;
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

Route::post('blogsApi', [BlogController::class, 'mostrarBlogs']);

Route::post('etiquetaApi', [BlogController::class, 'obtenerEtiquetas']);

Route::post('blogEtiquetaApi', [BlogController::class, 'mostrarBlogsEtiqueta']);

Route::post('mostrarEtiquetaApi', [BlogController::class, 'mostrarEtiquetas']);

Route::get('chatApi', [ChatController::class, 'preguntaChat']);

Route::get('articulos', [ArticulosController::class, 'index']);

Route::get('consultaCita', [CitasController::class, 'consulta']);

Route::post('agendarCita', [CitasController::class, 'store']);

Route::get('cancelarCita', [CitasController::class, 'cancelar']);

Route::get('reagendarCita', [CitasController::class, 'reagendar']);

Route::get('validarToken',[AlexaController::class, 'validarToken']);

Route::get('consultaTerapeuta',[TerapeutaApiController::class, 'index']);

Route::get('obtenerAgenda',[AgendaController::class, 'obtenerAgenda']);
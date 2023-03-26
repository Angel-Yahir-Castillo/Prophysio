<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;

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


//principal
Route::get('/', HomeController::class)->middleware('isGuest') ->name('home');

//mostrar pagina de error
Route::get('error', [ServiciosController::class, 'errorFuncion'])->name('mostrar.error');

// chat
Route::post('chat', [ChatController::class, 'preguntaChat'])->name('ayuda.chat');



require __DIR__.'/visit.php';
require __DIR__.'/admin.php';
require __DIR__.'/user.php';
require __DIR__.'/terapeutas.php';
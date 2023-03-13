<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PacientesController;
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
Route::get('/', HomeController::class)->name('home');

#section usuario registrado
    //abrir sesion
    Route::get('inicio', [UserController::class, 'abrirSesion'])->middleware('auth')->name('user.inicio');

    //recuperar contraseña
    
#endsection usuario registrado


//Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');





Route::get('error', [ServiciosController::class, 'errorFuncion'])->name('mostrar.error');





#usuarios
Route::post('registro_usuario',[UserController::class, 'registrar']);






#section apoyo
// chat
Route::post('chat', [ChatController::class, 'preguntaChat'])->name('ayuda.chat');
#endsection


require __DIR__.'/visit.php';
require __DIR__.'/admin.php';
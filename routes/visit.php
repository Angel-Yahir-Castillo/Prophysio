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


//blog
Route::get('blog', [BlogController::class, 'index'])->name('blog.all');

Route::get('blog/{articulo}', [BlogController::class, 'show'])->name('blog.show');

//agendar
Route::get('agendar', [AgendaController::class, 'index'])->name('agendar.cita');


//servicios 
Route::get('servicios', [ServiciosController::class, 'index'])->name('servicios.mostrar');


//auxiliares
//contacto
Route::get('contacto', [ContactoController::class, 'index'])->name('contacto.formulario');
Route::post('contacto', [ContactoController::class, 'enviarCorreoContacto'])->name('contacto.enviar');

Route::get('preguntas-frecuentes', [ContactoController::class, 'pre_fre'])->name('preguntas.frecuentes');
Route::get('terminos-y-condiciones', [ContactoController::class, 'ter_cond'])->name('terminos.condiciones');
Route::get('politica-de-privacidad', [ContactoController::class, 'politica'])->name('politica.privacidad');

//quienes somos? - nosotros
Route::get('quienes-somos', [NosotrosController::class, 'index'])->name('quienes.somos');
Route::get('especialistas', [NosotrosController::class, 'index'])->name('especialistas.mostrar');


//cuenta - visitante
Route::get('login', [VisitanteController::class, 'login'])->name('login.visit');
Route::get('register', [VisitanteController::class, 'registro'])->name('register.visit');


//registro, inicio de sesion
Route::post('validar-registro',[UserController::class, 'validar_register'])->name('validar.registro');

Route::post('inicia-sesion',[UserController::class, 'inicia_sesion'])->name('inicia.sesion');

Route::get('logout',[UserController::class, 'logout'])->name('user.logout');

//recuperar contraseña
Route::get('recuperar-contraseña',[VisitanteController::class, 'recuperaContraseñaVista'])->name('recuperar.contraseña');

Route::post('recuperar contraseña', [UserController::class, 'recuperarContraseña'])->name('user.recuperarContraseña');

Route::get('enviar-correo',[UserController::class, 'recuperaContraseñaVistaDos'])->name('recuperar.contraseñaEnviar');


  



?>
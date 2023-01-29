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




Route::get('Agenda/{dia}', function ($dia) {
    return 'Agenda del dia: '.$dia;
});


#section visitante
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

  
#endsection visitante


#section usuario registrado

Route::get('inicio', [UserController::class, 'abrirSesion'])->middleware('auth')->name('user.inicio');

#endsection usuario registrado

#section admin
Route::get('admin/blog', [BlogController::class, 'admin_show'])->name('blog.all.admin');
Route::get('admin/blog/crear', [BlogController::class, 'admin_create'])->name('blog.create.admin');
Route::get('admin/blog/editar', [BlogController::class, 'admin_edit'])->name('blog.edit.admin');
#endsection admin

#pacientes
Route::get('admin/pacientes', [PacientesController::class, 'paciente_mostrar']);
Route::get('admin/pacientes/registrar', [PacientesController::class, 'paciente_create']);
Route::get('admin/pacientes/editar', [PacientesController::class, 'paciente_edit']);


Route::get('error', [ServiciosController::class, 'errorFuncion'])->name('mostrar.error');





#usuarios
Route::post('registro_usuario',[UserController::class, 'registrar']);
Route::post('login_admin', [UserController::class, 'login_admin']);

#servicios
Route::get('cifrado',[ServiciosController::class, 'cifrado']);
Route::get('encripta', [ServiciosController::class, 'encriptar']);
Route::get('desencripta',[ServiciosController::class, 'desencriptar']);

#admin 
Route::get('admin', [AdminController::class, 'index'])->name('admin.login');
Route::get('admin/home', [AdminController::class, 'inicio'])->name('admin.home');

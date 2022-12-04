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

Route::get('/', HomeController::class);

#agendar
Route::get('agenda', [AgendaController::class, 'index']);

Route::get('Agenda/{dia}', function ($dia) {
    return 'Agenda del dia: '.$dia;
});


#blog
Route::get('blog', [BlogController::class, 'index']);
Route::get('admin/blog', [BlogController::class, 'admin_show']);
Route::get('admin/blog/crear', [BlogController::class, 'admin_create']);
Route::get('admin/blog/editar', [BlogController::class, 'admin_edit']);

Route::get('blog/{articulo}', [BlogController::class, 'show']);


#pacientes
Route::get('admin/pacientes', [PacientesController::class, 'paciente_mostrar']);
Route::get('admin/pacientes/registrar', [PacientesController::class, 'paciente_create']);
Route::get('admin/pacientes/editar', [PacientesController::class, 'paciente_edit']);


# cuenta - visitante
Route::get('login', [VisitanteController::class, 'login']);
Route::get('register', [VisitanteController::class, 'registro']);



# contacto
Route::get('contacto', [ContactoController::class, 'index']);
Route::get('preguntas-frecuentes', [ContactoController::class, 'pre_fre']);
Route::get('terminos-y-condiciones', [ContactoController::class, 'ter_cond']);
Route::get('politica-de-privacidad', [ContactoController::class, 'politica']);



#quienes somos? - nosotros
Route::get('quienes-somos', [NosotrosController::class, 'index']);




#servicios
Route::get('servicios', [ServiciosController::class, 'index']);
Route::get('cifrado',[ServiciosController::class, 'cifrado']);
Route::get('encripta', [ServiciosController::class, 'encriptar']);
Route::get('desencripta',[ServiciosController::class, 'desencriptar']);

#admin 
Route::get('admin', [AdminController::class, 'index']);
Route::get('admin/home', [AdminController::class, 'inicio']);

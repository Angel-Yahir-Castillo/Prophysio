<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\VisitanteController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\NosotrosController;
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

Route::get('agenda', [AgendaController::class, 'index']);

Route::get('blog', [BlogController::class, 'index']);

Route::get('blog/{articulo}', [BlogController::class, 'show']);

Route::get('Agenda/{dia}', function ($dia) {
    return 'Agenda del dia: '.$dia;
});

# cuenta - visitante
Route::get('login', [VisitanteController::class, 'login']);

Route::get('register', [VisitanteController::class, 'registro']);



# contacto
Route::get('contacto', [ContactoController::class, 'index']);




#quienes somos? - nosotros
Route::get('quienes-somos', [NosotrosController::class, 'index']);




#servicios
Route::get('servicios', [ServiciosController::class, 'index']);
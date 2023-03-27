<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifyEmailController;
use App\Http\Controllers\EmailVerificationPromptController;
use App\Http\Controllers\EmailVerificationNotificationController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\PreguntaSecretaController;

//abrir sesion
Route::get('inicio', [UserController::class, 'abrirSesion'])->middleware(['auth','verified'])->name('user.inicio');

//cerrar sesion
Route::post('logout',[UserController::class, 'logout'])->name('user.logout');

Route::prefix('inicio/')->middleware(['auth','verified'])->name('user.')->group(function () {
    //blog
    Route::get('blog', [BlogController::class, 'userIndex'])->name('blog.all');

    //agendar
    Route::get('agendar', [AgendaController::class, 'userIndex'])->name('agendar.cita');

    //servicios 
    Route::get('servicios', [ServiciosController::class, 'userIndex'])->name('servicios.mostrar');
});



//contacto
Route::prefix('inicio/')->middleware(['auth','verified'])->name('user.')->controller(ContactoController::class)->group(function(){
    Route::get('contacto', 'index_user')->name('contacto.formulario');
    Route::post('contacto', 'enviarCorreoContacto_user')->name('contacto.enviar');  
    Route::get('preguntas-frecuentes', 'pre_fre_user')->name('preguntas.frecuentes');
    Route::get('terminos-y-condiciones', 'ter_cond_user')->name('terminos.condiciones');
    Route::get('politica-de-privacidad', 'politica_user')->name('politica.privacidad');
});

//quienes somos? - nosotros
Route::prefix('inicio/')->middleware(['auth','verified'])->name('user.')->controller(NosotrosController::class)->group(function(){
    Route::get('quienes-somos', 'userIndex')->name('quienes.somos');
    Route::get('especialistas', 'userIndex')->name('especialistas.mostrar');
});


//configurar cuenta
Route::prefix('inicio/')->middleware(['auth','verified'])->name('user.')->controller(CuentaController::class)->group(function(){
    Route::get('cuenta', 'index')->name('cuenta.show');
   
});

//configurar pregunta secreta
Route::middleware(['auth','verified'])->name('user.')->controller(PreguntaSecretaController::class)->group(function(){
    Route::post('pregunta-secreta', 'preg_secreta')->name('pregunta.configurar');
    Route::get('configurar-pregunta', 'index')->name('configurar.pregunta');
});

//verificacion de correos
Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');
});



?>
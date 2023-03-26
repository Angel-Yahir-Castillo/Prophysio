<?php 
use App\Http\Controllers\BackupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\TerapeutaController;

Route::get('terapeuta/dashboard', [TerapeutaController::class, 'index'])
    ->middleware(['auth','isTerapeuta'])
    ->name('terapeuta.dashboard');

Route::get('terapeuta_logout', [TerapeutaController::class, 'logout'])
    ->middleware(['auth','isTerapeuta'])
    ->name('terapeuta.logout');

?>
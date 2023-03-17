<?php

use App\Http\Controllers\BackupController;
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



Route::get('admin', [AdminController::class, 'index'])->name('admin.login');
Route::post('login_admin', [AdminController::class, 'login'])->name('admin.login.form');

Route::get('admin/dashboard', [AdminController::class, 'inicio'])->middleware('auth')->name('admin.dashboard');
Route::get('admin_logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::prefix('admin/db')->middleware('auth')->name('admin.db.')->controller(BackupController::class)->group(function () {
    Route::get('/respaldos', 'index')->name('backup');
    Route::get('/restauracion', 'restore')->name('restore');
});

Route::get('respaldos-completos',[BackupController::class, 'respaldoCompleto'])->middleware('auth')->name('admin.db.backup.completo');
Route::post('respaldos-tabla',[BackupController::class, 'respaldarTabla'])->middleware('auth')->name('admin.db.backup.tabla');


Route::prefix('admin/blog')->middleware('auth')->name('admin.blog.')->controller(BlogController::class)->group(function () {
    Route::get('/','admin_index')->name('show');
    Route::get('/crear','admin_create')->name('create');
    Route::get('/eliminar','admin_delete')->name('delete');
    Route::get('/editar','admin_edit')->name('edit');
});

Route::prefix('admin/pacientes')->middleware('auth')->name('admin.pacientes.')->controller(PacientesController::class)->group(function () {
    Route::get('/','admin_index')->name('show');
    Route::get('/crear','admin_create')->name('create');
    Route::get('/eliminar','admin_delete')->name('delete');
    Route::get('/editar','admin_edit')->name('edit');
});

Route::prefix('admin/servicios')->middleware('auth')->name('admin.servicios.')->controller(ServiciosController::class)->group(function () {
    Route::get('/','admin_index')->name('show');
    Route::get('/crear','create')->name('create');
    Route::get('/eliminar','delete')->name('delete');
    Route::get('/editar','edit')->name('edit');

    Route::post('/store','store')->name('store');
});



?>
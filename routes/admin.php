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

Route::get('admin/dashboard', [AdminController::class, 'inicio'])->name('admin.dashboard');
Route::get('admin_logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::prefix('admin/db')->name('admin.db.')->controller(BackupController::class)->group(function () {
    Route::get('/respaldos', 'index')->name('backup');
    Route::get('/restauracion', 'restore')->name('restore');

   
});

Route::get('respaldos-completos',[BackupController::class, 'respaldoCompleto'])->name('admin.db.backup.completo');
Route::post('respaldos-tabla',[BackupController::class, 'respaldarTabla'])->name('admin.db.backup.tabla');



#blog
Route::get('admin/blog', [BlogController::class, 'admin_show'])->name('blog.all.admin');
Route::get('admin/blog/crear', [BlogController::class, 'admin_create'])->name('blog.create.admin');
Route::get('admin/blog/editar', [BlogController::class, 'admin_edit'])->name('blog.edit.admin');


#pacientes
Route::get('admin/pacientes', [PacientesController::class, 'paciente_mostrar']);
Route::get('admin/pacientes/registrar', [PacientesController::class, 'paciente_create']);
Route::get('admin/pacientes/editar', [PacientesController::class, 'paciente_edit']);


?>
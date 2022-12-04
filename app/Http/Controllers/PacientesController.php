<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function paciente_mostrar(){
        return view('admin.pacientes_mostrar');
    }

    public function paciente_create(){
        return view('admin.pacientes_registrar');
    }

    public function paciente_edit(){
        return view('admin.pacientes_modificar');
    }
}

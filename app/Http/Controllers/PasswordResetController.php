<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function mostrarOpciones(){
        return view('auth.opciones-recuperacion');
    }
}

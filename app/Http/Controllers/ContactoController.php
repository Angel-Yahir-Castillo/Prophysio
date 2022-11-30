<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index(){
        return view('contacto');
    }

    public function pre_fre(){
        return view('preguntas_frecuentes');
    }

    public function ter_cond(){
        return view('terminos_condiciones');
    }

    public function politica(){
        return view('politica_privacidad');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function index(){
        return view('servicios');
    }

    public function cifrado(){
        return view('cifrado_escitala');
    }

    public function encriptar(){
        return view('encripta');
    }

    public function desencriptar(){
        return view('desencripta');
    }

    public function errorFuncion(){
        abort(500);
    }
}

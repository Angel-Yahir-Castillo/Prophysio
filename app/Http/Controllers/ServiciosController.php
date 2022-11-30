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
}

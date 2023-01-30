<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index(){
        return view('contacto');
    }

    public function enviarCorreoContacto(Request $request){

        $request->validate([
            'nombre' => ['required','string'],
            'correo' => ['required', 'email'],
            'telefono' => 'required',
            'mensaje' => ['required', 'string'],
        ]);

        $correo = new ContactanosMailable($request->all());
        Mail::to('yahirgamerpvz@gmail.com')->send( $correo);
        
        return redirect(route('contacto.formulario'))->with('info', 'Correo enviado exitosamente');
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

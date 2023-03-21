<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use App\Models\Pregunta;

class ContactoController extends Controller
{
    public function index(){
        return view('contacto');
    }

    public function enviarCorreoContacto(Request $request){

        $request->validate([
            'nombre' => ['required','string','min:5'],
            'correo' => ['required', 'email','string'],
            'telefono' => ['required','string', 'max:10'],
            'mensaje' => ['required', 'string','max:255'],
        ]);

        $correo = new ContactanosMailable($request->all());
        Mail::to('yahirgamerpvz@gmail.com')->send( $correo);
        
        return redirect(route('contacto.formulario'))->with('info', 'Correo enviado exitosamente');
    }

    public function pre_fre(){
        $preguntas = Pregunta::all();
        return view('preguntas_frecuentes', compact('preguntas'));
    }

    public function ter_cond(){
        return view('terminos_condiciones');
    }

    public function politica(){
        return view('politica_privacidad');
    }

}

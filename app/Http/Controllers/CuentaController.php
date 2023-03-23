<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PregSecreta;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CuentaController extends Controller
{
    public function index(){
        $preguntas = PregSecreta::all();
        return view('user.cuenta',compact('preguntas'));
    }

    public function preg_secreta(Request $request){
        $request->validate([
            'pregunta' => ['required'],
            'respuesta' => ['required', 'string'],
            'g-recaptcha-response' => ['required', new \App\Rules\Recaptcha],
        ]);

        $usuario = User::where('email',Auth::user()->email)->first();

        $usuario->pregunta_id = $request->pregunta;
        $usuario->respuesta = $request->respuesta;
        $usuario->save(); 
    
        return redirect(route('user.inicio'))->with('info', 'Se actualizo la información');
    }
}

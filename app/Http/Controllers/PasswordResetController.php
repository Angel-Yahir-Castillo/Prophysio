<?php

namespace App\Http\Controllers;

use App\Models\PregSecreta;
use Illuminate\Http\Request;
use App\Models\User;
use com_exception;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function mostrarOpciones(){
        return view('auth.opciones-recuperacion');
    }

    public function mostrarPregunta(){
        return view('auth.ingresa-correo');
    }

    public function validarCorreo(Request $request){
        $user = User::where('email', $request->correo)->first();

        $request->validate([
            'correo' => ['required', 'email'],
        ]);

        if($user == null){
            return redirect(route('password.secret'))->with('info','El correo ingresado no esta registrado');
        }


        return redirect(route('password.pregunta'))->with('data',$user);
    }

    public function preguntar(){
        $usuario = session('data');
        $user = User::select('users.email','users.name','pregunta_secreta.pregunta')
        ->join('pregunta_secreta','users.pregunta_id','=','pregunta_secreta.id')
        ->where('users.id',$usuario->id)
        ->first();
        //return $user;
        return view('auth.ingresar_pregunta',compact('user'));
    }

    public function validarRespuesta(Request $request){
        $user = User::where('email', $request->correo)->first();

        $request->validate([
            'correo' => ['required', 'email'],
            'respuesta' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if($user->respuesta != $request->respuesta){
            $user = User::select('users.email','users.name','pregunta_secreta.pregunta')
            ->join('pregunta_secreta','users.pregunta_id','=','pregunta_secreta.id')
            ->where('users.email',$user->email)
            ->first();
            return view('auth.ingresar_pregunta',compact('user'));
            //return redirect(route('password.secret'))->with('info','El correo ingresado no esta registrado');
        }

        $user->contrasena=$request->password;
        $user->password=Hash::make($request->password);  
        $user->save();
        return redirect(route('login.visit'))->with('status','Se ha actualizado su contraseña');
    }
}

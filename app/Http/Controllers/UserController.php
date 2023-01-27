<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function registrar(Request $request){
        $usuario = new User();
        $usuario->nombre = $request->nombre;
        $usuario->correo_electronico = $request->correo;
        $usuario->password = $request->contrasena;
        $usuario->telefono = $request->telefono;
        $usuario->tipo_usuario = 4;
        $usuario->save();

        return redirect()->route('login.user');
    }

    public function inicia_sesion(Request $request){
        
        $user = User::where('email', $request->correo)->get();

        $request->validate([
            'correo' => ['required', 'email', 'string'],
            'contrasena' => ['required', 'string'],
        ]);

        $credentials = [
            "email" => $request->correo,
            "password" => $request->contrasena
        ];

        $remember  = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials, $remember)){

            $request->session()->regenerate();

            return redirect(route('user.sesion'));
        }

        if(count($user) >0){
            throw validationException::withMessages([
                'contrasena' => __('auth.password')
            ]);
        }
        else{
            throw validationException::withMessages([
                'correo' => __('auth.failed'),
            ]);
        }

        //return redirect(route('user.login'));

    }

    public function validar_register(Request $request){

        $request->validate([
            'correo' => ['required', 'email', 'string', 'unique:users,email'],
            'contrasena' => ['required', 'string'],
            'nombre' => ['required', 'string'],
            'telefono' => ['required', 'string'],
        ]);

        $user = new User();
        $user->name = $request->nombre;
        $user->email = $request->correo;
        $user->phone = $request->telefono;
        $user->password = Hash::make($request->contrasena);

       if($user->save()){
            Auth::login($user);
            return redirect(route('user.inicio'));
        }
        else{
            return redirect(route('register.visit'));
        }


    }

    public function abrirSesion(){
        return view('user.inicioUser');
    }


        
    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'));
    }

    public function login_admin(Request $request){
        $usuario = new User();
        $usuario->nombre = $request->user;
        $usuario->password = $request->contrasena;
        $usuario->tipo_usuario = $request->tipo;

        $admin = User::where('nombre',$usuario->nombre)->where('password',$usuario->password)->where('tipo_usuario',$usuario->tipo_usuario )->get();
        
        if(count($admin) >0){
            //return redirect()->route('admin.home');
            return view('admin.home');
        }
        else{
            $respuesta = 'contraseña incorrecta';
            return redirect()->route('admin.login', compact('respuesta'));
            //return view('admin.admin_login', compact('respuesta'));
        }
    }
}

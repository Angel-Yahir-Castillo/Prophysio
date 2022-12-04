<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

        return redirect()->route('admin.login');
    }

    public function login_admin(Request $request){
        $usuario = new User();
        $usuario->nombre = $request->user;
        $usuario->password = $request->contrasena;
        $usuario->tipo_usuario = $request->tipo;

        $admin = User::where('nombre',$usuario->nombre)->where('password',$usuario->password)->where('tipo_usuario',$usuario->tipo_usuario )->get();
        #$admin = User::where('nombre',$usuario->nombre)->where('password',$usuario->password)->get();
        
        if(count($admin) >0){
            return redirect()->route('admin.home');
        }
        else{
            return redirect()->route('admin.login');
        }
        
    }
}

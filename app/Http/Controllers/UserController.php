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
}

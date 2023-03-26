<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Mail\RecuperarContraseñaMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
 
    public function inicia_sesion(Request $request){
         
        /*
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
            'secret' => '6LcztLgkAAAAACPjzQROEzdg_PqH1WsrEU-N-ETV',
            'response' => $request->input('g-recaptcha-response'),
        ])->object();

        return $response->score;
        */
        $user = User::where('email', $request->correo)->get();

        $request->validate([
            'correo' => ['required', 'email', 'string'],
            'contrasena' => ['required', 'string'],
            'g-recaptcha-response' => ['required', new \App\Rules\Recaptcha],
        ]);
 
        $credentials = [
            "email" => $request->correo,
            "password" => $request->contrasena,
            "active" => 1
        ];
 
        $remember  = ($request->has('remember') ? true : false);

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            if(auth()->user()->respuesta==null){
                return redirect(route('user.configurar.pregunta'));
            }
            return redirect(route('user.inicio'));
        }

        if(count($user) >0){
            if($user[0]->active == 0){
                throw validationException::withMessages([
                    'correo' => __('auth.active')
                ]);
            }
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
            'correo' => ['required', 'email','max:255', 'string', 'unique:users,email'],
            'password' => ['required','confirmed', Rules\Password::defaults()],
            'nombre' => ['required', 'string','min:5','max:255'],
            'telefono' => ['required', 'string', 'max:10' , 'unique:users,phone'],
            'g-recaptcha-response' => ['required', new \App\Rules\Recaptcha],
        ]);

        $user = new User();
        $user->name = $request->nombre;
        $user->email = $request->correo;
        $user->phone = $request->telefono;
        $user->contrasena = $request->password;
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


    public function recuperarContraseña(Request $request){
        $user = User::where('email', $request->correo)->first();

        $request->validate([
            'correo' => ['required', 'email'],
        ]);

        if($user == null){
            return redirect(route('recuperar.contraseña'))->with('info','El correo ingresado no esta registrado');
        }

        $correo = new RecuperarContraseñaMailable($user);
        Mail::to($request->correo)->send($correo);

        return view('recuperar_contrasena_Correo', compact('user'));
    }
        
    public function recuperaContraseñaVistaDos(){
        return view('recuperar_contrasena_Correo');
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'))->with('status', 'Sesion cerrada');
    }

}

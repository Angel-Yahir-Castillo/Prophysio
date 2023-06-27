<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\User;

class PacientesController extends Controller
{
    public function index(){
        $pacientes = Paciente::all();
        return view('admin.pacientes.mostrar',compact('pacientes'));
    }

    public function create(){
        $usuarios = User::where('es_paciente','0')->get();
        return view('admin.pacientes.crear', compact('usuarios'));
    }

    public function store(Request $request){

        $request->validate([
            'user'=>['required'],
            'nombre' => ['required','max:255', 'string'],
            'ap' => ['required','max:255', 'string'],
            'am' => ['required','max:255', 'string'],
            'fechaNac'=>['required','string'],
            'peso' => ['required','numeric'],
            'cv' => ['required','integer','min:1'],
            'sexo' => ['required','max:6', 'string'],
            'cp' => ['required','max:5', 'string', 'min:5'],
            'municipio' => ['required','max:255', 'min:5','string'],
            'colonia' => ['required','max:255','min:5', 'string'],
            'calle' => ['required','max:255', 'min:5','string'],
            'nc' => ['required','max:255', 'string'],
            'enfermedades' => ['required', 'string'],
            'causa' => ['required','max:255', 'string'],
            'fotografia' => ['required','mimes:jpeg,png,jpg','max:5000']
        ]);

        $fileName = str_replace(' ','',$request->nombre).'.'.$request->fotografia->getClientOriginalExtension();
        $request->fotografia->move(public_path("pacientes"),$fileName);
        
        $fecha_unix = strtotime($request->fechaNac);
        $fecha_formateada = date('Y-m-d', $fecha_unix);

        return $fecha_unix;
        $paciente = New Paciente();
        $paciente->nombres = $request->nombre;
        $paciente->a_paterno = $request->ap;
        $paciente->a_materno = $request->am;
        $paciente->user_id = $request->user;
        $paciente->fecha_nacimiento = $fecha_formateada;
        $paciente->foto = $fileName;
        $paciente->peso = $request->peso;
        $paciente->sexo = $request->sexo;
        $paciente->cp = $request->cp;
        $paciente->municipio = $request->municipio;
        $paciente->colonia = $request->colonia;
        $paciente->calle = $request->calle;
        $paciente->no_casa = $request->nc;
        $paciente->cantidad_visitas = $request->cv;
        $paciente->alergias_enfermedades = $request->enfermedades;
        $paciente->situacion_por_la_cual_necesita_terapia = $request->causa;


        $paciente->save();

        $usuario = User::where('id',$request->user)->first();
        $usuario->es_paciente = 1;
        $usuario->save();
        return redirect(route('admin.pacientes.show'))->with('info', 'Se a registrado exitosamente');
    }

    public function edit(){
        return view('admin.pacientes_modificar');
    }
}

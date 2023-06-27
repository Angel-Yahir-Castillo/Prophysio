<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Cita;

class PythonController extends Controller
{
    public function pacienteR(){
        $user = User::where('es_paciente','0')->first();
        return view('paciente-registro',compact('user'));
    }

    public function citasR(){
        return view('cita-registro');
    }
    public function guardarCitas(Request $request){

        $cita = New Cita();
        $cita->terapeuta_id = $request->terapeuta;
        $cita->paciente_id = $request->paciente;
        $cita->tipo_terapia_id = $request->terapia;
        $cita->estado_cita_id = $request->estado;
        $cita->fecha = $request->fecha;;
        $cita->hora = $request->hora;
        $cita->folio = $request->folio;
        $cita->no_cita = $request->nc;
        $cita->observaciones = $request->observaciones;

        $cita->save();

        return redirect(route('python.cita'));
    }

    public function guardar(Request $request){

        $paciente = New Paciente();
        $paciente->nombres = $request->nombre;
        $paciente->a_paterno = $request->ap;
        $paciente->a_materno = $request->am;
        $paciente->user_id = $request->user;
        $paciente->fecha_nacimiento = $request->fecha;;
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
        return redirect(route('python.paciente'));
    }

}

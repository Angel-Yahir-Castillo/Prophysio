<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use App\Models\User;
use App\Models\TipoTerapia;
use App\Models\Terapeuta;
use App\Models\Encuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendaController extends Controller
{

    public function getTerapias(){
        $tipos = TipoTerapia::all();
        return $tipos;
    }

    public function getTerapeutas(){
        $terapeutas = Terapeuta::all();
        return $terapeutas;
    }
    
    public function index(){
        $tipos = TipoTerapia::all();
        $terapeutas = Terapeuta::all();
        
        return view('agenda',compact(['tipos','terapeutas']));
    }


    public function folio(){
        return view('user.folio');
    }
    
    public function userIndex2(){
        $citas = Cita::all();

        $events = [];

        foreach ($citas as $event) {
            $events[] = [
                'title' => $event->id,
                'start' => $event->fecha_inicio,
                'end' => $event->fecha_fin,

            ];
        }

        return view('user.agenda',compact('events'));
    }

    public function misCitas(){
        $citas2 = Cita::select('citas.fecha_inicio','citas.paciente', 'terapeutas.nombres', 'terapeutas.a_paterno', 'terapeutas.a_materno', 'tipo_terapia.nombre','citas.folio')
        ->join('terapeutas','citas.terapeuta_id','=','terapeutas.id')
        ->join('tipo_terapia','citas.tipo_terapia_id','=','tipo_terapia.id')
        ->where('citas.user_id',Auth::user()->id)
        ->where('citas.estado_cita_id','1')
        ->orderBy('citas.fecha_inicio', 'ASC') 
        ->get();

        $citas = [];

        foreach ($citas2 as $date) {
            $citas[] = [
                'hora' => explode(' ',$date->fecha_inicio)[1],
                'dia' => \Carbon\Carbon::createFromFormat('Y-m-d', explode(' ',$date->fecha_inicio)[0])->format('d-m-Y'),
                'paciente' => $date->paciente,
                'terapeuta' => $date->nombres . ' ' . $date->a_paterno .' ' . $date->a_materno,
                'terapia' => $date->nombre,
                'folio' => $date->folio,
            ];
        }
        //return $citas;
        return view('user.misCitas',compact('citas'));
    }

    public function agendar(){
        $tipos = TipoTerapia::all();
        $terapeutas = Terapeuta::all();

        return view('user.agenda',compact(['tipos','terapeutas']));
    }

    public function obtenerAgenda(Request $request){
        $citas = Cita::where('terapeuta_id',$request->terapeuta)
            ->where('estado_cita_id','1')
            ->get();

        $events = [];

        foreach ($citas as $event) {
            $events[] = [
                'title' => 'No disponible',
                'start' => $event->fecha_inicio,
                'end' => $event->fecha_fin,

            ];
        }

        return $events;
    }

    public function store(Request $request){
        $request->validate([
            'dia' => ['required', 'string'],
            'hora' => ['required', 'string'],
            'terapeuta' => ['required', 'string'],
            'nombre' => ['required'],
            'tipo' => ['required', 'min:0'],
        ]);

        $user=User::where('email',$request->correo)->first();
        $cita = new Cita();
        $cita->terapeuta_id = $request->terapeuta;
        $cita->tipo_terapia_id = $request->tipo;
        $cita->paciente=$request->nombre;
        $cita->fecha_inicio = $request->dia.' '.$request->hora;
    
        $fechaF = \Carbon\Carbon::parse($request->dia.$request->hora);
        $folio =$user->id. $fechaF->format('dmYH');
        $fechaF->addHour(1);

        $cita->fecha_fin=$fechaF->format('Y-m-d H:i:s');
        $cita->folio=$folio;
        $cita->user_id=$user->id;
        $cita->save();

        $fechaCita = \Carbon\Carbon::parse($request->dia.' '.$request->hora); 
        return redirect(route('user.agendar.cita'))->with('info', [$folio,$fechaCita]);
    }

    public function update(Request $request){
        $request->validate([
            'dia' => ['required', 'string'],
            'hora' => ['required', 'string'],
            'folio' => ['required', 'string'],
        ]);

        $cita = Cita::where('folio',$request->folio)->first();
        if($cita==null)
            return redirect(route('user.agendar.cita'))->with('actualizacion', 'Ocurrio un error al reagendar la cita'); //no existe esa cita
        $fechaDisp = Cita::where('fecha_inicio',$request->dia . ' '.$request->hora)
                    ->where('terapeuta_id',$cita->terapeuta_id)
                    ->first(); 
        if($fechaDisp!=null)
            return redirect(route('user.agendar.cita'))->with('actualizacion', 'Esa fecha y hora ya estan ocupadas');//no esta disponible la nueva fecha con ese terapeuta
        
        try{
            $cita->fecha_inicio = $request->dia . ' '.$request->hora;
            $fechaF = \Carbon\Carbon::parse($request->fecha);
            $fechaF->addHour(1);
            $cita->fecha_fin=$fechaF->format('Y-m-d H:i:s');

            $cita->save();
            return redirect(route('user.agendar.cita'))->with('actualizacion', 'Se modifico el horario para la cita'); //si se pudo reagendar
        } 
        catch (\Exception $e){
            return redirect(route('user.agendar.cita'))->with('actualizacion', 'Ocurrio un error al reagendar la cita'); //error inesperado
        }
    }

    public function modificar($folio){
        $date = Cita::select('citas.fecha_inicio','citas.paciente','citas.estado_cita_id', 'citas.folio', 'terapeutas.id','terapeutas.nombres', 'terapeutas.a_paterno', 'terapeutas.a_materno', 'tipo_terapia.nombre')
        ->join('terapeutas','citas.terapeuta_id','=','terapeutas.id')
        ->join('tipo_terapia','citas.tipo_terapia_id','=','tipo_terapia.id')
        ->where('citas.folio', $folio)
        ->first();
        if($date == null || $date->estado =! 1){
            return redirect(route('user.agendar.cita'));
        }

        $cita = array(
            'hora' => explode(' ',$date->fecha_inicio)[1],
            'dia' => \Carbon\Carbon::createFromFormat('Y-m-d', explode(' ',$date->fecha_inicio)[0])->format('d-m-Y'),
            'paciente' => $date->paciente,
            'terapeuta' => $date->nombres . ' ' . $date->a_paterno .' ' . $date->a_materno,
            'terapia' => $date->nombre,
            'folio' => $date->folio,
            'terapeuta_id' => $date->id
        );
        
        return view('user.reagendar', compact('cita'));
    }

    public function obtenerHoras(Request $request){
        // Convierte la fecha a un objeto Carbon para trabajar con ella
        $fecha = \Carbon\Carbon::parse($request->fecha);

        //obtener la hora actual
        $hora_actual_real = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        
        // Crea un arreglo con todas las horas entre 10am y 8pm
        $horas_disponibles = [];
        $hora_actual = $fecha->copy()->setHour(10)->setMinute(0)->setSecond(0);
        
        while ($hora_actual->hour < 20) {
            $hora_disponible = $hora_actual->format('H:i:s');
            
            if ($hora_actual > $hora_actual_real && !Cita::where('terapeuta_id',$request->terapeuta)->where('fecha_inicio', $hora_actual->format('Y-m-d H:i:s'))->exists()) {

                $horas_disponibles[] = $hora_disponible;
            }
            $hora_actual->addHour();
        }

        return $horas_disponibles;
    }

    public function encuesta(){
        return view('user.encuesta');
    }

    public function encuestaStore(Request $request){
        $encuesta = new Encuesta();
        $encuesta->calificacion = $request->calificacion;
        if($request->comentario!=null)
            $encuesta->comentario = $request->comentario;
        else
            $encuesta->comentario = '';
        $encuesta->save();
        return redirect(route('user.inicio'))->with('info', 'Muchas gracias por tu participacion');
    }
}

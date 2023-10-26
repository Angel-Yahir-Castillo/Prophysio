<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use App\Models\User;
use App\Models\TipoTerapia;
use App\Models\Terapeuta;
use Illuminate\Http\Request;

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

    public function userIndex(){
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
        $user=User::where('email',$request->correo)->first();
        $cita = new Cita();
        $cita->terapeuta_id = $request->terapeuta;
        $cita->tipo_terapia_id = $request->tipo;

        $cita->fecha_inicio = $request->dia.' '.$request->hora.':00';
    
        $fechaF = \Carbon\Carbon::parse($request->dia.$request->hora.':00');
        $folio =$user->id. $fechaF->format('dmYH');
        $fechaF->addHour(1);

        $cita->fecha_fin=$fechaF->format('Y-m-d H:i:s');
        $cita->folio=$folio;
        $cita->user_id=$user->id;
        $cita->save();

        return redirect(route('user.agendar.folio'))->with('info', $folio);
    }
}

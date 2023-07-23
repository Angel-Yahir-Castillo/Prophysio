<?php

namespace App\Http\Controllers;
use App\Models\Cita;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(){
        return view('agenda');
    }

    public function userIndex(){
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

    public function create(){
        
    }
}

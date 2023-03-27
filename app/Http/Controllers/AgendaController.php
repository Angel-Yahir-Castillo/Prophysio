<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(){
        return view('agenda');
    }

    public function userIndex(){
        return view('user.agenda');
    }

    public function create(){
        
    }
}

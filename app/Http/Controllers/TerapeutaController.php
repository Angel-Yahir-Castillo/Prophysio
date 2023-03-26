<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Terapeuta;
use Illuminate\Support\Facades\Auth;

class TerapeutaController extends Controller
{
    public function index(){
        $terapeuta = Terapeuta::where('user_id',Auth::user()->id)->first();
        return view('terapeuta.dashboard',compact('terapeuta'));
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
}

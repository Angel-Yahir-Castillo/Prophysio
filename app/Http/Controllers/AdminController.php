<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
class AdminController extends Controller
{
    public function index(){
        //$usuarios = User::all();
        //return $usuarios;
        $respuesta =  ' ';
        return view('admin.admin_login', compact('respuesta'));
    }

    public function inicio(){
        return view('admin.home');
    }




}

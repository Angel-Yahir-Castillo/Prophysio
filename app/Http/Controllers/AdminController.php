<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
class AdminController extends Controller
{
    public function index(){
        //$usuarios = User::all();
        //return $usuarios;
        return view('admin.admin_login');
    }

    public function inicio(){
        return view('admin.home');
    }




}

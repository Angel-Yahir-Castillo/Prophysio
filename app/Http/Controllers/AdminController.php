<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }

    public function blog(){
        return view('admin.blog.blog_admin_mostrar');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('blog');
    }

    public function show($articulo){
        return view('blog.show', compact('articulo'));
    }

    public function admin_show(){
        return view('admin.blog_admin_mostrar');
    }

    public function admin_create(){
        return view('admin.blog_crear');
    }

    public function admin_edit(){
        return view('admin.blog_modificar');
    }
}

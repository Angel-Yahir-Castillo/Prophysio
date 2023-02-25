<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blogxtag;

class BlogController extends Controller
{
    public function index(){
        return view('blog');
    }

    public function mostrarBlogs(Request $request){
        $blogs = Blog::all();
        return json_encode($blogs);
    }

    public function obtenerEtiquetas(Request $request){
        $etiquetas = Blogxtag::select('tags.nombre','tags.id')
            ->join('tags','tags.id','=','blog_xtag.tag_id')
            ->where('blog_xtag.blog_id', $request->id)
            ->get();
        
            return $etiquetas;
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

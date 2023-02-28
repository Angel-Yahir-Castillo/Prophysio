<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use ZipArchive;

class AdminController extends Controller
{

    public function index()
    {
        //$usuarios = User::all();
        //return $usuarios;
        $respuesta =  ' ';
        return view('admin.admin_login', compact('respuesta'));
    }

    public function inicio()
    {
        return view('admin.home');
    }

    public function respaldar()
    {
        $nombre = "prophysio";
        $usuario = "root";
        $password = "";

        $fecha = date('Y-m-d_His');

        $nombre_sql = $nombre . '-' . $fecha . '.sql';

        $dump = "mysqldump --user=$usuario --password=$password $nombre > $nombre_sql";

        exec($dump);

        //para guardar en .zip
        $zip = new ZipArchive();

        $nombre_zip = $nombre . '-' . $fecha . '.zip';

        if ($zip->open($nombre_zip, ZipArchive::CREATE) === true) {
            $zip->addFile($nombre_sql);
            $zip->close();
            unlink($nombre_sql);
            header("Location: $nombre_zip");
            exit();
        };
    }
}

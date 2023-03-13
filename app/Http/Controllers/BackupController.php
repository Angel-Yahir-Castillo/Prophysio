<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;
use App\Models\Historial;
use App\Exceptions;
use Illuminate\Support\Facades\Auth;

class BackupController extends Controller
{
    public function index(){
        $historial = Historial::select('historial_respaldos.created_at', 'historial_respaldos.nombre_respaldo', 'historial_respaldos.tipo_respaldo', 'users.name')
        ->join('users','historial_respaldos.user_id','=','users.id')
        ->orderby('historial_respaldos.created_at','desc')
        ->get();
        return view('admin.db.respaldos',compact('historial'));
    }

    public function restore(){
        return view('admin.db.restauracion');
    }

    public function respaldoCompleto(){
        $nombre = "prophysio_huejutla";
        $usuario = "root";
        $password = "";

        $fecha = date('Y-m-d_His');

        $nombre_sql = $nombre . '-' . $fecha . '.sql';

        $dump = "mysqldump --user=$usuario --password=$password $nombre > $nombre_sql";

        exec($dump);

        header("Location: $nombre_sql");

        $ultimo = Historial::orderby('created_at','desc')->first();
        try {
            unlink($ultimo->nombre_respaldo);
        }catch(\Exception $ex){

        }

        $nuevo = new Historial();
        $nuevo->nombre_respaldo = $nombre_sql;
        $nuevo->tipo_respaldo = 'completo';
        $nuevo->user_id = Auth::user()->id;
        $nuevo->save();

        exit();

        /*
        //para guardar en .zip
            $zip = new ZipArchive();

            $nombre_zip = $nombre .'-'.$fecha.'.zip';

            if($zip->open($nombre_zip,ZipArchive::CREATE) === true){
                $zip->addFile($nombre_sql);
                $zip->close();
                unlink($nombre_sql);
                header("Location: $nombre_zip");
                //unlink($nombre_zip);
                exit();
            };*/
    }

    public function respaldarTabla(Request $request){
        $nombre = "prophysio_huejutla";
        $usuario = "root";
        $password = "";
        $tabla = $request->name_table;

        $fecha = date('Y-m-d_His');

        $nombre_sql = $nombre . '-' . $tabla .'-' . $fecha . '.sql';

        $dump = "mysqldump --user=$usuario --password=$password $nombre $tabla > $nombre_sql";

        exec($dump);

        header("Location: $nombre_sql");

        $ultimo = Historial::orderby('created_at','desc')->first();
        try {
            unlink($ultimo->nombre_respaldo);
        }catch(\Exception $ex){

        }

        $nuevo = new Historial();
        $nuevo->nombre_respaldo = $nombre_sql;
        $nuevo->tipo_respaldo = 'tabla';
        $nuevo->user_id = Auth::user()->id;
        $nuevo->save();

        exit();
    }
}

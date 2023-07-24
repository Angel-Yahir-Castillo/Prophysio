<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Terapeuta;

class PacientesController extends Controller
{
    public function index(){
        $terapeuta = Terapeuta::where('user_id',Auth::user()->id)->first();
        $pacientes = Paciente::paginate(5);
        return view('terapeuta.pacientes.mostrar',compact(['pacientes','terapeuta']));
    }

    public function create(){
        $terapeuta = Terapeuta::where('user_id',Auth::user()->id)->first();
        $usuarios = User::where('es_paciente','0')->get();
        return view('terapeuta.pacientes.crear', compact(['usuarios','terapeuta']));
    }

    public function store(Request $request){

        $request->validate([
            'user'=>['required'],
            'nombre' => ['required','max:255', 'string'],
            'ap' => ['required','max:255', 'string'],
            'am' => ['required','max:255', 'string'],
            'fechaNac'=>['required','string'],
            'peso' => ['required','numeric'],
            'cv' => ['required','integer','min:1'],
            'sexo' => ['required','max:6', 'string'],
            'cp' => ['required','max:5', 'string', 'min:5'],
            'municipio' => ['required','max:255', 'min:5','string'],
            'colonia' => ['required','max:255','min:5', 'string'],
            'calle' => ['required','max:255', 'min:5','string'],
            'nc' => ['required','max:255', 'string'],
            'enfermedades' => ['required', 'string'],
            'causa' => ['required','max:255', 'string'],
            'fotografia' => ['required','mimes:jpeg,png,jpg','max:5000']
        ]);

        $fileName = str_replace(' ','',$request->nombre).'.'.$request->fotografia->getClientOriginalExtension();
        $request->fotografia->move(public_path("pacientes"),$fileName);
        
        $fecha_unix = strtotime($request->fechaNac);
        $fecha_formateada = date('Y-m-d', $fecha_unix);

        return $fecha_unix;
        $paciente = New Paciente();
        $paciente->nombres = $request->nombre;
        $paciente->a_paterno = $request->ap;
        $paciente->a_materno = $request->am;
        $paciente->user_id = $request->user;
        $paciente->fecha_nacimiento = $fecha_formateada;
        $paciente->foto = $fileName;
        $paciente->peso = $request->peso;
        $paciente->sexo = $request->sexo;
        $paciente->cp = $request->cp;
        $paciente->municipio = $request->municipio;
        $paciente->colonia = $request->colonia;
        $paciente->calle = $request->calle;
        $paciente->no_casa = $request->nc;
        $paciente->cantidad_visitas = $request->cv;
        $paciente->alergias_enfermedades = $request->enfermedades;
        $paciente->situacion_por_la_cual_necesita_terapia = $request->causa;


        $paciente->save();

        $usuario = User::where('id',$request->user)->first();
        $usuario->es_paciente = 1;
        $usuario->save();
        return redirect(route('terapeuta.pacientes.show'))->with('info', 'Se a registrado exitosamente');
    }

    public function edit(){
        return view('terapeuta.pacientes_modificar');
    }


    public function exportar(){
        // Nombre de la tabla que deseas convertir
        $nombreTabla = 'pacientes';

        // Consulta los datos de la tabla
        //$datos = DB::table($nombreTabla)->get()->toArray();
        $datos = DB::table($nombreTabla)
        ->select('nombres', 'edad', 'sexo','tipo_lesion', 'gravedad_lesion', 'aptitud_fisica','imc', 'hipertension', 'lesion_previa','migrañas', 'osteoporosis', 'cantidad_sesiones')
        ->get()
        ->toArray();

        // Nombre del archivo CSV de salida
        $nombreArchivoCSV = 'prophysio_pacients.csv';

        // Ruta donde se almacenará el archivo CSV
        $rutaArchivoCSV = storage_path('app/' . $nombreArchivoCSV);

        // Abre el archivo CSV en modo escritura
        $archivoCSV = fopen($rutaArchivoCSV, 'w');

        // Establecer la codificación a UTF-8
        //stream_filter_append($archivoCSV, 'convert.iconv.utf-8/iso-8859-1', STREAM_FILTER_WRITE);

        // Escribe el encabezado del archivo CSV
        //fputcsv($archivoCSV, array_keys((array) $datos[0]));
        $encabezado = ['Nombre', 'Edad', 'Sexo','Tipo de Lesion', 'Gravedad de la Lesion', 'Nivel de aptitud fisica','IMC', 'Hipertension', 'Lesion Previa','Migranas', 'Osteoporosis', 'Cantidad de sesiones de recuperacion'];
        fputcsv($archivoCSV, $encabezado);
        
        // Escribe los datos de la tabla en el archivo CSV
        foreach ($datos as $fila) {
            fputcsv($archivoCSV, (array) $fila);
        }

        // Cierra el archivo CSV
        fclose($archivoCSV);

        // Descarga el archivo CSV generado
        return response()->download($rutaArchivoCSV);
    }
}

@extends('terapeuta.plantilla_terapeuta')

@section('meta')

@endsection

@section('title', 'Registrar Pacientes')

@section('foto', asset('terapeutas/'.$terapeuta->foto))

@section('name', $terapeuta->nombres.' '.$terapeuta->a_paterno.' '.$terapeuta->a_materno)

@section('content')

    <div class="row container section">
            <form action="{{ route('terapeuta.pacientes.store') }}" enctype="multipart/form-data" method="POST" class="col s12">

            @csrf 
                <div class="row card-panel">

                    <center><b>Registrar un paciente</b></center>
                    <strong style="color: red;">@error('g-recaptcha-response') {{ $message }} @enderror</strong>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" value="{{ old('nombre') }}" name="nombre" class="validate" required
                        pattern="p{L}+[a-zA-Z]+" title="El nombre no puede tener mas de 255 letras, no puedes colocar numeros">
                        <label for="nombre">Nombres:</label>
                        <strong style="color: red;">@error('nombre') {{ $message }} @enderror</strong> 
                    </div>
                    
                    <div class="input-field col m6 s12">
                        <input id="ap" type="text" value="{{ old('ap') }}" name="ap" class="validate" required
                        pattern="p{L}+[a-zA-Z]+" title="El apellido no puede tener mas de 255 letras, no puedes colocar numeros">
                        <label for="ap">Apellido paterno:</label>
                        <strong style="color: red;">@error('ap') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="am" type="text" value="{{ old('am') }}" name="am" class="validate" required
                        pattern="[a-zA-Z]+" title="El apellido no puede tener mas de 255 letras, no puedes colocar numeros">
                        <label for="am">Apellido materno:</label>
                        <strong style="color: red;">@error('am') {{ $message }} @enderror</strong> 
                    </div>


                    <div class="input-field col s12">
                        <select id="user" name="user"> 
                            @foreach ($usuarios as $user)
                                <option value="{{$user->id}}">{{$user->name.' - '.$user->email.' - '.$user->phone}}</option>
                            @endforeach
                        </select>
                        <label>Usuario</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input id="fechaNac" name="fechaNac" type="text"  class="datepicker validate" required>
                        <label for="fechaNac">Fecha de nacimiento:</label>
                        <strong style="color: red;">@error('fechaNac') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12 m6">
                        Sexo
                        <p>
                            <label>
                                <input class="with-gap validate" value="Hombre" name="sexo" type="radio" checked/>
                                <span>Hombre</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap validate" value="Mujer" name="sexo" type="radio" />
                                <span>Mujer</span>
                        </label>
                        </p>
                        <strong style="color: red;">@error('sexo') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="peso" name="peso" type="number" step="0.001" value="{{ old('peso') }}" class="validate" required>
                        <label for="peso">Peso en kg:</label>
                        <strong style="color: red;">@error('peso') {{ $message }} @enderror</strong> 
                    </div>

                    
                    <div class="input-field col m6 s12">
                        <input id="estatura" name="estatura" type="number" step="0.01" value="{{ old('estatura') }}" class="validate" required>
                        <label for="estatura">Estatura en cm:</label>
                        <strong style="color: red;">@error('estatura') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="file-field input-field col m6 s12">
                        <div class="btn">
                            <span>Fotografia</span>
                            <input type="file" required name="fotografia" id="fotografia" onchange="vistaPreliminar(event)" accept=".jpeg,.jpg,.png" >
                        </div>
                        <div class="file-path-wrapper">
                            <input required class="file-path validate" type="text">
                        </div>
                        <strong style="color: red;">@error('fotografia') {{ $message }} @enderror</strong> 
                    </div>

                    <div style="display: none" id="div-imagen" class="col m6 s12">
                        <center><img src="" width="150px" height="150px" alt="" id="img-foto"></center>
                    </div>

                    <div class="col s12">
                        <p>Datos de direccion</p>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="cp" name="cp" type="text" value="{{ old('cp') }}" class="validate" pattern="[0-9]{5}" 
                        title="Ingresa un codigo postal valido" required>
                        <label for="cp">Codigo postal:</label>
                        <strong style="color: red;">@error('cp') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="municipio" name="municipio" type="text" value="{{ old('municipio') }}" class="validate" pattern="p{L}+[a-zA-Z]+" 
                        title="Ingresa un municipio valido" required>
                        <label for="municipio">Municipio:</label>
                        <strong style="color: red;">@error('municipio') {{ $message }} @enderror</strong> 
                    </div>
                    
                    <div class="input-field col m6 s12">
                        <input id="colonia" name="colonia" type="text" value="{{ old('colonia') }}" class="validate" pattern="p{L}+[a-zA-Z][0-9]+" 
                        title="Ingresa una colonia valida" required>
                        <label for="colonia">Colonia:</label>
                        <strong style="color: red;">@error('colonia') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="calle" name="calle" type="text" value="{{ old('calle') }}" class="validate" pattern="p{L}+[a-zA-Z][0-9]+" 
                        title="Ingresa una calle valida" required>
                        <label for="calle">Calle:</label>
                        <strong style="color: red;">@error('calle') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="nc" name="nc" type="text" value="{{ old('nc') }}" class="validate" pattern="[a-zA-Z0-9]+" 
                        required>
                        <label for="nc">Numero de casa:</label>
                        <strong style="color: red;">@error('nc') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12">
                        <input id="cv" name="cv" type="number" value="{{ old('cv') }}" class="validate" required>
                        <label for="cv">Cantidad de visitas necesarias:</label>
                        <strong style="color: red;">@error('cv') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12">
                        <input id="enfermedades" type="text" value="{{ old('enfermedades') }}" name="enfermedades" class="validate" required>
                        <label for="enfermedades">Alergias y/o enfermedades:</label>
                        <strong style="color: red;">@error('enfermedades') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12">
                        <input id="causa" type="text" value="{{ old('causa') }}" name="causa" class="validate" required>
                        <label for="causa">Situacion por la cual necesita terapia:</label>
                        <strong style="color: red;">@error('causa') {{ $message }} @enderror</strong> 
                    </div>


                    <div class="col s12">
                        <center><button class="btn waves-effect waves-light" type="submit" value="">Registrar
                            <i class="material-icons left">
                                create
                            </i>
                        </button></center>
                    </div>


            
                </div>

        </form>
    </div>

    <div class="fixed-action-btn">
        <a href="{{route('terapeuta.pacientes.show')}}" class="btn-floating btn-large red" >
            <i class="large material-icons">arrow_back</i>
        </a>
    </div>
@endsection

@section('scripts_styles')

    <script>
        let vistaPreliminar = (event)=>{
            let leer_img = new FileReader();
            let id_img = document.getElementById('img-foto');
            document.getElementById('div-imagen').style.display = 'block';
            leer_img.onload = ()=>{
                if(leer_img.readyState==2){
                    id_img.src = leer_img.result;
                }
            }
            leer_img.readAsDataURL(event.target.files[0])
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                format: 'dd mmm, yyyy',
                yearRange: [1923,2023],
                i18n: {
                    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                    weekdays: ["Domingo","Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                    weekdaysShort: ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    weekdaysAbbrev: ["D","L", "M", "M", "J", "V", "S"],
                    cancel : 'cancelar',
                    clear: 'limpiar'
                }
            });
        });
    </script>
@endsection
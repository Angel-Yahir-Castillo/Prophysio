@extends('user.plantilla_user')

@section('meta')

@endsection

@section('title', 'Mi cuenta')

@section('content')
    <center><h3>Hola @auth {{Auth::user()->name}} @endauth</h3></center>


    <div class=" container">
        <div class="row section">
            <div class="col m2 l3 s0"></div>
            <form action="{{ route('user.pregunta.configurar') }}" method="POST" class="col l6 m8 s12">
            @csrf 
                <div class="row card-panel">

                    @if (session('status'))
                        <div class="col s12">
                            <p class="red-text">{{ session("status")}}</p> 
                        </div>
                    @endif
                    <center><b>Configurar pregunta secreta</b></center>

                    <small style="color: red;">@error('g-recaptcha-response') {{ $message }} @enderror</small>

                    <div class="input-field col s12">
                        <select id="pregunta" name="pregunta"> 
                            @foreach ($preguntas as $pregunta)
                                <option value="{{$pregunta->id}}">{{$pregunta->pregunta}}</option>
                            @endforeach
                        </select>
                        <label>Elige una Pregunta:</label>
                    </div>
                    
                    <div class="input-field col s12">
                        <input id="respuesta" name="respuesta" type="text" value="{{ old('respuesta') }}" requiered autofocus class="validate">
                        <label for="respuesta">Respuesta:</label>
                        <small style="color: red;">@error('respuesta') {{ $message }} @enderror</small> 

                    </div>

                    <div class="col s12">
                        <center><button class="btn" type="submit"> Aceptar</button></center>
                    </div>

                </div>
            </form>


        </div>
        <div class="row section">
            <form method="POST" class="col s12" action="{{ route('user.logout') }}">
                @csrf
                <center><button type="submit" class="btn">
                    Cerrar sesion
                </button></center> 
            </form>
        </div>
    </div>



@endsection

@section('scripts_styles')

@endsection

@extends('plantilla_visit')

@section('title', 'Prophysio Huejutla - Registrarse')

@section('content')

    <br><br><br>
    <div class="section container">

        <div class="row">

            <form action="{{ route('validar.registro') }}" method="POST" class="col s12">

            @csrf 
                <div class="row card-panel">

                    <center><b>Registrarse</b></center>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" value="{{ old('nombre') }}" name="nombre" class="validate" required
                            pattern="[A-Za-z]{4,}" title="El nombre debe tener al menos una longitud de 4 letras">
                        <label for="nombre">Nombre:</label>
                        <small style="color: red;">@error('nombre') {{ $message }} @enderror</small> 
                    </div>
                    
                    <div class="input-field col s12">
                        <input id="correo" name="correo" type="email" value="{{ old('correo') }}" class="validate" required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo electronico valido">
                        <label for="correo">Correo electronico:</label>
                        <small style="color: red;">@error('correo') {{ $message }} @enderror</small> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="telefono" name="telefono" type="tel" value="{{ old('telefono') }}" class="validate" required
                        pattern="[0-9]{10,10}" title="El telefono debe contener una longitud de 10 digitos">
                        <label for="telefono">Telefono:</label>
                        <small style="color: red;">@error('telefono') {{ $message }} @enderror</small> 
                    </div>

                    <div class="input-field col m5 l5 s11">
                        <input id="contrasena" name="contrasena" value="{{ old('contrasena') }}" type="password" class="validate" required
                            pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])[A-Za-z\d$@$!%()*?&#.$($)$-$_]{8,}$" title="La contraseña debe contener al menos una letra mayuscula, 
                            una letra miniscula, un numero, un caracter especial y una longitud de al menos 8 caracteres">
                        <label for="contrasena">Contraseña:</label>
                        <small style="color: red;">@error('contrasena') {{ $message }} @enderror</small> 
                    </div>
                    <div class="col m1 l1 s1">
                        <button style="background-color: #fff; border:#fff; cursor:pointer;" type="button" onclick="mostrarContrasena()"><i class="material-icons ">remove_red_eye</i></button>
                    </div>

                    <div class="col s12">
                        <label for="politica">
                            <input id="politica" name="politica" type="checkbox" class="filled-in validate" required
                            title="Acepta las politicas de privacidad para continuar">
                            <span><b>He leido y acepto la <a href="{{ route('politica.privacidad') }}">politica de privacidad</a></b></span>
                        </label>
                    </div>

                    <center><button class="btn waves-effect waves-light" type="submit" value="">Registrarse
                        <i class="material-icons left">
                            person_add
                        </i>
                    </button></center>

                    <br>

                    <center>¿Ya tienes una cuenta? <a class="" href="{{ route('login.visit') }}">Inicia sesion aqui</a></center>

                </div>

                

            </form>
        </div>

    </div>
    <br><br><br>

    <script>
        function mostrarContrasena(){
            var tipo = document.getElementById("contrasena");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
    </script>
    @endsection
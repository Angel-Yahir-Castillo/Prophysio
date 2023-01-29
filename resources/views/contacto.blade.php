@extends('plantilla_visit')

@section('title', 'Prophysio Huejutla - Contacto')

@section('content')

    
    <div class="section container">
    {{ Breadcrumbs::render('contacto') }}
        <div class="row ">

            <div class="col s0 m1"></div>
            <form action="{{ route('contacto.enviar') }}" method="POST" class="col m10 s12">
            @csrf
                <div class="row card-panel">

                    <center><b>Contactanos</b></center>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" value="{{ old('nombre') }}" name="nombre" class="validate" required>
                        <label for="nombre">Nombre completo:</label>
                        <small style="color: red;">@error('nombre') {{ $message }} @enderror</small> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="correo" name="correo" value="{{ old('correo') }}"  type="email" class="validate" required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo electronico valido">
                        <label for="correo">Correo electronico:</label>
                        <small style="color: red;">@error('correo') {{ $message }} @enderror</small> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="telefono" name="telefono" value="{{ old('telefono') }}"  type="tel" class="validate" 
                        pattern="[0-9]{10,10}" title="El telefono debe contener una longitud de 10 digitos" required>
                        <label for="telefono">Telefono:</label>
                        <small style="color: red;">@error('telefono') {{ $message }} @enderror</small> 
                    </div>



                    <div class="input-field col m12 s12">
                        <textarea id="mensaje" value="{{ old('mensaje') }}"  class="materialize-textarea validate" name="mensaje" required></textarea>
                        <label for="mensaje">Mensaje:</label>
                        <small style="color: red;">@error('mensaje') {{ $message }} @enderror</small> 
                    </div>

                    <center><button class="btn" type="submit" value="">Enviar
                        <i class="material-icons left">
                            send
                        </i>
                    </button></center>

                    <br>

                </div>

                

            </form>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    @if (session('info'))
        <script>
            M.toast({
                html: '{{ session("info")}} ',
                classes: 'black',
                displayLength: 3000,
            })
            //alert("{{ session('info') }}");
        </script>
    @endif
    <br><br><br>
    @endsection
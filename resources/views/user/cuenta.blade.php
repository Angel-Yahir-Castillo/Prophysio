@extends('user.plantilla_user')

@section('meta')

@endsection

@section('title', 'Mi cuenta')

@section('content')
    <center><h3>Hola @auth {{Auth::user()->name}} @endauth</h3></center>


    <div class=" container">
        <div class="row section">
            <div class="col s12">
                <a class="btn" href="{{route('configurar.show2faForm')}}">
                    Autenticacion de Doble factor
                </a>
            </div>


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

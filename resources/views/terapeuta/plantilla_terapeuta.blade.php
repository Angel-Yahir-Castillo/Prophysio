<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('meta')

    <title>@yield('title')</title>
    
</head>
<body>

    <div class="navbar-fidex">
        <div class="row">
            <div id="encabezado" style="width:100%; height: 70px; background-color:#C7F7F7" class="col s12">
                <a href="#" data-target="menu-side" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
                <a href="#" class="bradn-logo">Prophysio</a>
                <a href="{{route('terapeuta.logout')}}" class=""><i class="material-icons">exit_to_app</i> Cerrar sesion </a>
            </div>
        </div>
    </div>


    <ul class="sidenav"  id="menu-side">
        <li>
            <div class="user-view">
                <div style="background-color: #C7F7F7;" class="background">
                </div>
                <a href="{{route('terapeuta.dashboard')}}"><img class="circle responsive-img" src="@yield('foto')"></a>
                <a href="{{route('terapeuta.dashboard')}}"><span class="black-text name">@yield('name')</span></a>
                <a href="{{route('terapeuta.dashboard')}}"><span class="black-text email">Terapeuta</span></a>
            </div>
        </li>
        <li><a class="waves-effect" href="#"><i class="material-icons left">today</i>Mis Citas</a></li>
        <li><div class="divider"></div></li>
        <li><a class="waves-effect" href="#"><i class="material-icons left">group</i>Mis Pacientes</a></li>
        <li><div class="divider"></div></li>
        <li><a class="waves-effect" href="#"><i class="material-icons left">content_paste</i>Agenda</a></li>
        <li><div class="divider"></div></li>
        <li><a class="waves-effect" href="#"><i class="material-icons left">search</i>Buscar cita</a></li>
        <li><div class="divider"></div></li>
        <li><a class="waves-effect" href="#" @if (Request::is('admin/blog/*') || Request::is('admin/blog')) style="background-color:#C7F7F7;" @endif><i class="material-icons left">account_circle</i> Mi cuenta</a></li>
        <li><div class="divider"></div></li>
    </ul>

    <ul id="id_bd" class="dropdown-content">
        <li><a class="waves-effect" href="{{route('admin.db.backup')}}"><i class="material-icons left">backup</i> Respaldos</a></li>
        <li><a class="waves-effect" href="{{route('admin.db.restore')}}"><i class="material-icons left">restore</i> Restauracion</a></li>
    </ul>

    <ul id="id_personalizar" class="dropdown-content">
        <li><a class="waves-effect" href="#"><i class="material-icons left">edit</i> Encabezado</a></li>
        <li><a class="waves-effect" href="#"><i class="material-icons left">edit</i> Pie de pagina</a></li>
        <li><a class="waves-effect" href="#"><i class="material-icons left">view_carousel</i> Carrousel</a></li>
        <li><a class="waves-effect" href="#"><i class="material-icons left">chat</i> Preguntas ChatBot</a></li>
        <li><a class="waves-effect" href="#"><i class="material-icons left">question_answer</i> Preguntas frecuentes</a></li>
    </ul>

    <ul id="id_empresa" class="dropdown-content">
        <li><a class="waves-effect" href="{{route('admin.empresa.show')}}"><i class="material-icons left">info</i> Informacion</a></li>
        <li><a class="waves-effect" href="#"><i class="material-icons left">policy</i> Politica de privacidad</a></li>
    </ul>

    @yield('content')

    
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
            M.AutoInit();
        });
    </script>

    <style>
        #encabezado{
            display: flex;
            flex-direction: row;
            justify-content:space-around;
            align-items: center;
        }
        #encabezado a{
            color:black;
            font-size: 25px;
        }
    </style>
    @yield('scripts_styles')
</body>
</html>
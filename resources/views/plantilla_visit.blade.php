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
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>@yield('title') </title>
    
</head>

<body>
    <div class="navbar-fixed">
        <nav style="background-color: #C7F7F7;" >
            <div class="nav-wrapper">
                <a href="{{ route('home')}}" style="padding-left:30px" class="brand-logo black-text">Prophysio</a>
                <a href="#" data-target="menu-responsive" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
    
                <ul class="right hide-on-med-and-down" style="padding-right:20px">
                    <li><a  href="{{ route('home') }}" style="<?php if(request()->Is('/')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>" class="">Inicio</a></li> 
                    <li>
                        <a class="" href="{{ route('agendar.cita') }}" style=" <?php if(request()->Is('agendar')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Agendar
                            <i class="material-icons left">
                                today
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('servicios.mostrar') }}" style="<?php if(request()->Is('servicios')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Servicios
                            <i class="material-icons left">
                                build
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('blog.all') }}" style="<?php if(request()->Is('blog')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Blog
                            <i class="material-icons left">
                                forum
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="id_sesiones" style="<?php if (request()->Is('login') or request()->Is('register') or request()->Is('recuperar-contraseña') or request()->Is('recuperar contraseña')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Cuenta
                            <i class="material-icons left">
                                account_circle
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('quienes.somos') }}" style="<?php if(request()->Is('quienes-somos')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Nosotros
                            <i class="material-icons left">
                                people_outline
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('contacto.formulario') }}" style="<?php if(request()->Is('contacto')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Contacto
                            <i class="material-icons left">
                                chat
                            </i>
                        </a>
                    </li>
                </ul>
    
            </div>
            
        </nav>
    </div>

    <ul id="id_sesiones" class="dropdown-content">
        <li>
            <a class="black-text" href="{{ route('login.visit') }}">
                Iniciar sesion
                <i class="material-icons left">
                    person
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="{{ route('register.visit') }}">
                Registrarse
                <i class="material-icons left">
                    person_add
                </i>
            </a>
        </li>
    </ul>

    <ul id="id_sesionResp" class="dropdown-content">
        <li>
            <a class="black-text" href="{{ route('login.visit') }}">
                Iniciar sesion
                <i class="material-icons left">
                    person
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="{{ route('register.visit') }}">
                Registrarse
                <i class="material-icons left">
                    person_add
                </i>
            </a>
        </li>
    </ul>

    <ul class="sidenav" style="background-color: #FFFFFF"  id="menu-responsive">
    <li><a  href="{{ route('home')}}" style="<?php if(request()->Is('/')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>" class="">Inicio</a></li> 
                    <li>
                        <a class="" href="{{ route('agendar.cita') }}" style="<?php if(request()->Is('agendar')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Agendar
                            <i class="material-icons left">
                                today
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('servicios.mostrar') }}" style="<?php if(request()->Is('servicios')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Servicios
                            <i class="material-icons left">
                                build
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('blog.all') }}" style="<?php if(request()->Is('blog')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Blog
                            <i class="material-icons left">
                                today
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="id_sesionResp" style="<?php if (request()->Is('login') or request()->Is('register')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Cuenta
                            <i class="material-icons left">
                                account_circle
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('quienes.somos') }}" style="<?php if(request()->Is('quienes-somos')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Nosotros
                            <i class="material-icons left">
                                people_outline
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="{{ route('contacto.formulario') }}" style="<?php if(request()->Is('contacto')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;'; ?>">
                            Contacto
                            <i class="material-icons left">
                                chat
                            </i>
                        </a>
                    </li>
    </ul>

    @yield('content')

    <footer class="page-footer" style="background-color: #C7F7F7;">
          <div class="container">
            <div class="row">
                <div class="col l4 m4 s12">
                    <h5 class="black-text"> Informacion</h5>
                    <ul>
                    <li><a class="" style="<?php if(request()->Is('politica-de-privacidad')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="{{ route('politica.privacidad') }}"><b>Politica de privacidad</b></a></li>
                    <li><a class="" style="<?php if(request()->Is('preguntas-frecuentes')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="{{ route('preguntas.frecuentes') }}"><b>Preguntas frecuentes</b></a></li>
                    <li><a class="" style="<?php if(request()->Is('terminos-y-condiciones')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="{{ route('terminos.condiciones') }}"><b>Terminos y condiciones</b></a></li>
                    </ul>
                </div>
              <div class="col l4 m4 s12">
                <h5 class="black-text">Contacto</h5>
                <ul>
                  <li><a class="" href="{{ route('contacto.formulario') }}" style="<?php if(request()->Is('contacto')) echo 'color: #E20089;'; else echo 'color:#000000;';?>"><b>Correo electronico</b></a></li>
                  <li><p class="black-text text-lighten-3">Ubicacion: <br> Calle Coahulia. S/N. col. Tahuizan. Huejutla Hgo </p></li>
                  <li><p class="black-text text-lighten-3" >Telefono: +52 2225081501</p></li>
                </ul>
              </div>
              <div class="col l4 m4 s12">
                <h5 class="black-text">¿Quienes somos?</h5>
                <ul>
                  <li><a class="" style="<?php if(request()->Is('quienes-somos')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="{{ route('quienes.somos') }}"><b>Mision y vision</b></a></li>
                  <li><a class="" style="<?php if(request()->Is('servicios')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="{{ route('servicios.mostrar') }}"><b>Servicios</b></a></li>
                  <li><a class="" style="<?php if(request()->Is('quienes-somos')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="{{ route('quienes.somos') }}"><b>Especialistas</b></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class=" footer-copyright">
            <div class=" row container black-text">
              <div class="col section s12 m6">
                <p>© 2022 Prophysio Huejutla</p> 
              </div>
              <div class="col s4 m2 section">
                <a class="black-text text-lighten-4 " target="_blank" href="https://www.instagram.com/prophysio_huejutla/"> <img width="30px" height="30px" src="<?php echo asset('iconos/instagram.png')?>"></a>
              </div>
              <div class="col s4 m2 section">
                <a class="black-text text-lighten-4 " target="_blank"  href="https://www.facebook.com/"> <img width="30px" height="30px" src="<?php echo asset('iconos/facebook.png')?>"></a>
              </div>
              <div class="col s4 m2 section">
                <a class="black-text text-lighten-4 " target="_blank"href="https://api.whatsapp.com/send?phone=5212225081501&text=Hola%2C%20gracias%20por%20comunicarte%20a%20Prophysio%2C%20%C2%BFen%20qu%C3%A9%20podemos%20ayudarte%3F%20"> <img width="30px" height="30px" src="<?php echo asset('iconos/whatsapp.png')?>"></a>
              </div>
            </div>
          </div>
    </footer>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Menu</title>
    <link rel="icon" type="image/png"  href="logo.png">
</head>

<body>
    <div class="navbar-fixed">
        <nav style="background-color: #C7F7F7;" >
            <div class="nav-wrapper">
                <a href="<?php echo url('/')?>" style="padding-left:30px" class="brand-logo black-text">Prophysio</a>
                <a href="#" data-target="menu-responsive" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
    
                <ul class="right hide-on-med-and-down" style="padding-right:20px">
                    <li><a  href="<?php echo url('/')?>" style="<?php if(request()->Is('/')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>" class="">Inicio</a></li> 
                    <li>
                        <a class="" href="<?php echo url('blog') ?>" style="<?php if(request()->Is('blog')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Blog
                            <i class="material-icons left">
                                forum
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?php echo url('agenda') ?>" style="<?php if(request()->Is('agenda')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Agendar
                            <i class="material-icons left">
                                today
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?php echo url('servicios') ?>" style="<?php if(request()->Is('servicios')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Servicios
                            <i class="material-icons left">
                                today
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="id_sesiones" style="<?php if (request()->Is('login') or request()->Is('register')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Cuenta
                            <i class="material-icons left">
                                account_circle
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?php echo url('quienes-somos') ?>" style="<?php if(request()->Is('quienes-somos')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Nosotros
                            <i class="material-icons left">
                                chat
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?php echo url('contacto') ?>" style="<?php if(request()->Is('contacto')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
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
            <a class="black-text" href="<?php echo url('login') ?>">
                Iniciar sesion
                <i class="material-icons left">
                    person
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('register') ?>">
                Registrarse
                <i class="material-icons left">
                    person_add
                </i>
            </a>
        </li>
    </ul>

    <ul id="id_sesionResp" class="dropdown-content">
        <li>
            <a class="black-text" href="<?php echo url('login') ?>">
                Iniciar sesion
                <i class="material-icons left">
                    person
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('register') ?>">
                Registrarse
                <i class="material-icons left">
                    person_add
                </i>
            </a>
        </li>
    </ul>

    <ul class="sidenav" style="background-color: #FFFFFF"  id="menu-responsive">
    <li><a  href="<?php echo url('/')?>" style="<?php if(request()->Is('/')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>" class="">Inicio</a></li> 
                    <li>
                        <a class="" href="<?php echo url('blog') ?>" style="<?php if(request()->Is('blog')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Blog
                            <i class="material-icons left">
                                today
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?php echo url('agenda') ?>" style="<?php if(request()->Is('agenda')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Agendar
                            <i class="material-icons left">
                                today
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?php echo url('servicios') ?>" style="<?php if(request()->Is('servicios')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Servicios
                            <i class="material-icons left">
                                today
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="id_sesionResp" style="<?php if (request()->Is('login') or request()->Is('register')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Cuenta
                            <i class="material-icons left">
                                account_circle
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?php echo url('quienes-somos') ?>" style="<?php if(request()->Is('quienes-somos')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Nosotros
                            <i class="material-icons left">
                                chat
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="" href="<?php echo url('contacto') ?>" style="<?php if(request()->Is('contacto')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Contacto
                            <i class="material-icons left">
                                chat
                            </i>
                        </a>
                    </li>
    </ul>

    

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>
</body>
</html>
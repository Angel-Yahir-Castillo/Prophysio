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
</head>

<body>
    <div class="navbar-fixed">
        <nav style="background-color: #61FFE2;" >
            <div class="nav-wrapper container">
                <a href="<?php echo url('/')?>" class="brand-logo">Prophysio</a>
                <a href="#" data-target="menu-responsive" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
    
                <ul class="right hide-on-med-and-down">
                    <li><a class="black-text" href="#">Inicio</a></li>
                    <li><a class="black-text" style="background-color: #00D10D;" href="<?php echo url('blog') ?>">Blog</a></li>
                    <li>
                        <a class="black-text" href="<?php echo url('agenda') ?>">
                            Agendar
                            <i class="material-icons left">
                                today
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="black-text dropdown-trigger" href="#" data-target="id_sesion2">
                            Cuenta
                            <i class="material-icons left">
                                account_circle
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="black-text" href="#">
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

    <ul id="id_sesion2" class="dropdown-content">
        <li>
            <a class="black-text" href="#">
                Iniciar sesion
                <i class="material-icons left">
                    person
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="#">
                Registrarse
                <i class="material-icons left">
                    person_add
                </i>
            </a>
        </li>
    </ul>

    <ul id="id_sesion" class="dropdown-content">
        <li>
            <a class="black-text" href="#">
                Iniciar sesion
                <i class="material-icons left">
                    person
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="#">
                Registrarse
                <i class="material-icons left">
                    person_add
                </i>
            </a>
        </li>
    </ul>

    <ul class="sidenav" id="menu-responsive">
        <li><a class="black-text" href="#">Inicio</a></li>
        <li><a class="black-text" href="<?php echo url('blog') ?>">Blog</a></li>
        <li>
            <a class="black-text" href="<?php echo url('agenda') ?>">
                Agendar
                <i class="material-icons left">
                    today
                </i>
            </a>
        </li>
        <li>
            <a class="black-text dropdown-trigger" href="#" data-target="id_sesion">
                Cuenta
                <i class="material-icons left">
                    account_circle
                </i>
            </a>
        </li>
        <li>
            <a class="black-text" href="#">
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
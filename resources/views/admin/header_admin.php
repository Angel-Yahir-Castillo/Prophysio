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
                <a href="<?php echo url('admin')?>" style="padding-left:20px" class="brand-logo black-text">Prophysio</a>
                <a href="#" data-target="menu-responsive" class="sidenav-trigger">
                    <i class="material-icons">menu</i>
                </a>
    
                <ul class="right hide-on-med-and-down" style="padding-right:10px">
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="id_terapeutas" style="<?php if (request()->Is('admin.fisioterapeutas') or request()->Is('register')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Fisioterapeutas
                            <i class="material-icons left">
                                group
                            </i>
                        </a>
                    </li>
                    <li>
                    <?php $pacientes = array('admin/pacientes', 'admin/pacientes/registrar', 'admin/pacientes/editar');?>
                        <a class="dropdown-trigger" href="#" data-target="id_pacientes" style="<?php if (in_array(request()->path(), $pacientes)) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Pacientes   
                            <i class="material-icons left">
                                group
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="id_citas" style="<?php if (request()->Is('login') or request()->Is('register')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Citas
                            <i class="material-icons left">
                                assignment_ind
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="id_servicios" style="<?php if (request()->Is('login') or request()->Is('register')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Servicios
                            <i class="material-icons left">
                                account_circle
                            </i>
                        </a>
                    </li>
                    <li>
                        <?php $blog = array('admin/blog', 'admin/blog/crear', 'admin/blog/editar');?>
                        <a class="dropdown-trigger" href="#" data-target="id_blog" style="<?php if (in_array(request()->path(), $blog)) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Blog
                            <i class="material-icons left">
                                forum
                            </i>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-trigger" href="#" data-target="id_sesiones" style="<?php if (request()->Is('login') or request()->Is('register')) echo 'background-color: #E20089; color:#FFFFFF;'; else echo 'color:#000000;';?>">
                            Cerrar sesion
                        </a>
                    </li>
                </ul>
    
            </div>
            
        </nav>
    </div>

    <!-- Menus desplegables-->
    <ul id="id_terapeutas" class="dropdown-content">
        <li>
            <a class="black-text" href="<?php echo url('') ?>">
                Registrar
                <i class="material-icons left">
                person_add
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('') ?>">
                Mostrar
                <i class="material-icons left">
                view_list
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('') ?>">
                Modificar
                <i class="material-icons left">
                    edit
                </i>
            </a>
        </li>
    </ul>

    <ul id="id_pacientes" class="dropdown-content">
        <li>
            <a class="black-text" href="<?php echo url('admin/pacientes/registrar') ?>">
                Registrar
                <i class="material-icons left">
                person_add
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('admin/pacientes') ?>">
                Mostrar
                <i class="material-icons left">
                view_list
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('admin/pacientes/editar') ?>">
                Modificar
                <i class="material-icons left">
                    edit
                </i>
            </a>
        </li>
    </ul>

    <ul id="id_citas" class="dropdown-content">
        <li>
            <a class="black-text" href="<?php echo url('') ?>">
                Registrar 
                <i class="material-icons left">
                person_add
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('') ?>">
                Mostrar
                <i class="material-icons left">
                view_list
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('') ?>">
                Reprogramar
                <i class="material-icons left">
                    alarm
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('') ?>">
                Cancelar
                <i class="material-icons left">
                    highlight_off
                </i>
            </a>
        </li>
    </ul>

    <ul id="id_servicios" class="dropdown-content">
        <li>
            <a class="black-text" href="<?php echo url('') ?>">
                Agregar
                <i class="material-icons left">
                person_add
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('') ?>">
                Mostrar
                <i class="material-icons left">
                view_list
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('') ?>">
                Editar
                <i class="material-icons left">
                    edit
                </i>
            </a>
        </li>
    </ul>

    <ul id="id_blog" class="dropdown-content">
        <li>
            <a class="black-text" href="<?php echo url('admin/blog/crear') ?>">
                Agregar
                <i class="material-icons left">
                add
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('admin/blog') ?>">
                Mostrar
                <i class="material-icons left">
                view_list
                </i>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a class="black-text" href="<?php echo url('admin/blog/editar') ?>">
                Editar
                <i class="material-icons left">
                    edit
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
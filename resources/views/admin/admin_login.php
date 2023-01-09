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

    <title>Inicia sesion</title>
    <link rel="icon" type="image/png"  href="logo.png">
</head>

<body>
    <div class="navbar-fixed">
        <nav style="background-color: #C7F7F7;" >
            <div class="nav-wrapper">
                <a href="#" class="brand-logo center black-text">Prophysio</a>
            </div>
        </nav>
    </div>

    <br><br><br>
    <div class="section container">

        <div class="row">

            <div class="col m2 l3 s0"></div>
            <form action="<?php echo url('login_admin');?>" method="POST" class="col l6 m8 s12">

            <?php echo csrf_field() ?>
                <div class="row card-panel">

                    <center><b>Iniciar sesion</b></center>
                    <div class="input-field col s12">
                        <input id="user" name="user" type="text" class="validate" required>
                        <label for="user">Usuario:</label>
                    </div>

                    <div class="input-field col s12 ">
                        <select name="tipo"> 
                            <option value="2">Terapeuta</option>
                            <option value="1" selected>Administrador</option>
                        </select>
                        <label>Tipo de usuario</label>
                    </div>


                    <div class="input-field col s12">
                        <input id="contrasena" name="contrasena" type="password" class="validate" required>
                        <label for="contrasena">Contraseña:</label>
                    </div>


                    <center><button class="btn waves-effect waves-light" type="submit" value="">Iniciar sesion
                        <i class="material-icons left">
                        keyboard_tab
                        </i>
                    </button></center> 

                    <?php echo $respuesta ?>


                </div>

                

            </form>
        </div>

    </div>
    <br><br><br>


    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>
</body>
</html>
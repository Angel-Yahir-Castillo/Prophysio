<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prophysio Huejutla - Login</title>
</head>

<body>
    <?php include 'header.php';?>

    
    <br><br><br>
    <div class="section container">

        <div class="row">

            <div class="col m2 l3 s0"></div>
            <form action="" method="GET" class="col l6 m8 s12">

                <div class="row card-panel">

                    <center><b>Iniciar sesion</b></center>
                    <div class="input-field col s12">
                        <input id="correo" name="correo" type="email" class="validate" required>
                        <label for="correo">Correo electronico:</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">remove_red_eye</i>
                        <input id="contraseña" name="contraseña" type="password" class="validate" required>
                        <label for="contraseña">Contraseña:</label>
                    </div>

                    <center> ¿Se te olvido tu contraseña?  <a class="" href="<?php echo url('') ?>">Recuperar contraseña</a></center><br>

                    <center><button class="btn" type="submit" value="">Iniciar sesion
                        <i class="material-icons left">
                            
                        </i>
                    </button></center>

                    <br>

                    <center> ¿No tienes una cuenta?  <a class="" href="<?php echo url('register') ?>">Registrarse aqui</a></center>

                </div>

                

            </form>
        </div>

    </div>
    <br><br><br>
    <?php include 'footer.php';?>
</body>
</html>
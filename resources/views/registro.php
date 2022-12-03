<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prophysio Huejutla - Registrarse</title>
</head>

<body>
    <?php include 'header.php';?>

    <br><br><br>
    <div class="section container">

        <div class="row">

            <form action="" method="GET" class="col s12">

                <div class="row card-panel">

                    <center><b>Registrarse</b></center>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" name="nombre" class="validate" required>
                        <label for="nombre">Nombre:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="correo" name="correo" type="email" class="validate" required>
                        <label for="correo">Correo electronico:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="telefono" name="telefono" type="tel" class="validate" required>
                        <label for="telefono">Telefono:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <i class="material-icons prefix">remove_red_eye</i>
                        <input id="contraseña" name="contraseña" type="password" class="validate" required>
                        <label for="contraseña">Contraseña:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <i class="material-icons prefix">remove_red_eye</i>
                        <input id="contra" name="contra" type="password" class="validate" required>
                        <label for="contra">Repetir contraseña:</label>
                    </div>

                    <div class="col s12">
                        <label for="politica">
                            <input id="politica" name="politica" type="checkbox" class="filled-in validate" required>
                            <span><b>He leido y acepto la <a href="<?php echo url('politica-de-privacidad')?>">politica de privacidad</a></b></span>
                        </label>
                    </div>

                    <center><button class="btn" type="submit" value="">Registrarse
                        <i class="material-icons left">
                            person_add
                        </i>
                    </button></center>

                    <br>

                    <center>¿Ya tienes una cuenta? <a class="" href="<?php echo url('login') ?>">Inicia sesion aqui</a></center>

                </div>

                

            </form>
        </div>

    </div>
    <br><br><br>
    <?php include 'footer.php';?>
</body>
</html>
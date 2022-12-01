<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prophysio Huejutla - Contacto</title>
</head>

<body>
    <?php include 'header.php';?>

    <br><br><br>
    <div class="section container">

        <div class="row">

            <div class="col s0 m1"></div>
            <form action="" method="GET" class="col m10 s12">

                <div class="row card-panel">

                    <center><b>Contactanos</b></center>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" name="nombre" class="validate" required>
                        <label for="nombre">Nombre completo:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="correo" name="correo" type="email" class="validate" required>
                        <label for="correo">Correo electronico:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="telefono" name="telefono" type="tel" class="validate" required>
                        <label for="telefono">Telefono:</label>
                    </div>



                    <div class="input-field col m12 s12">
                        <textarea id="mensaje" class="materialize-textarea validate" name="mensaje" required></textarea>
                        <label for="mensaje">Mensaje:</label>
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
    <br><br><br>
    <?php include 'footer.php';?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prophysio Huejutla - Contacto</title>
</head>

<body>
    <?php include 'header.php';
        
    ?>

    <center><h1>Cifrado Escitala</h1><center>

    <div class="section container">

        <div class="row">

            <form action="<?php echo url('encripta') ?>" method="get" class="col s12">

                <div class="row card-panel">

                    <center><b>Cifrar un mensaje</b></center>
                    <div class="input-field col s12">
                        <input id="mensaje" type="text" name="mensaje" class="validate" required>
                        <label for="mensaje">Mensaje para cifrar:</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="clave" type="number" name="clave" class="validate" required>
                        <label for="clave">Clave para cifrar:</label>
                    </div>

                    <button class="btn" type="submit" >Encriptar</button>

                </div>

                </div>

            </form>
        </div>

    </div>


    <div class="section container">

        <div class="row">

            <form action="<?php echo url('desencripta') ?>" method="GET" class="col s12">

                <div class="row card-panel">

                    <center><b>Descifrar un mensaje</b></center>
                    <div class="input-field col s12">
                        <input id="mensaje_en" type="text" name="mensaje" class="validate" required>
                        <label for="mensaje_en">Mensaje cifrado:</label>
                    </div>

                    <div class="input-field col s12">
                        <input id="clave_des" name="clave" type="number" class="validate" required>
                        <label for="clave_des">Clave para descifrar:</label>
                    </div>

                    <input class="btn" type="submit" value="DesEncriptar"></input>

                </div>

                </div>

            </form>
        </div>

    </div>

    

    <?php include 'footer.php';?>
</body>
</html>
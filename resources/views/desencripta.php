<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prophysio Huejutla</title>
</head>

<body>
    <?php include 'header.php';
        require_once('cifrado.php');

        $mensaje = $_GET['mensaje'];
        $clave = $_GET['clave'];

        $desencriptado = desCifrar($mensaje, $clave);
    ?>

    <center><h1>Mensaje desEncriptado:</h1><center>
    <center><h1><?php echo $desencriptado; ?></h1><center>

    <a class="btn" href="<?php echo url('cifrado') ?>" > Regresar</a>

    <br><br><br><br><br><br><br><br><br><br>



    

    <?php include 'footer.php';?>
</body>
</html>
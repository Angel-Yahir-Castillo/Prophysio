<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <form action="{{route('python.guarda.cita')}}" method="POST">
    @csrf 

    terapeuta
    <input type="text" name="terapeuta" id=""><br>
    terapia
    <input type="text" name="terapia" id=""><br>

estado 
    <input type="text" name="estado" value="1" id=""><br>
paciente
    <input type="text" name="paciente" id=""><br>
fecha
    <input type="text" name="fecha" id=""><br>
hora
    <input type="text" name="hora" value="" id=""><br>
folio 
    <input type="text" name="folio" value="" id=""><br>
numero cita
    <input type="text" name="nc" id=""><br>
observaciones
    <input type="text" name="observaciones" id=""><br>

    <input type="submit" value="enviar">
    </form>
</body>
</html>
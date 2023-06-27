<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <form action="{{route('python.guarda.paciente')}}" method="POST">
    @csrf 
    nombre
    <input type="text" name="nombre" value="{{$user->name}}" id=""> <br>
    ap
    <input type="text" name="ap" id=""><br>
    am
    <input type="text" name="am" id=""><br>
    user
    <input type="text" name="user" value="{{$user->id}}" id=""><br>
fecha
    <input type="text" name="fecha" id=""><br>
peso
    <input type="text" name="peso" id=""><br>
sexo
    <input type="text" name="sexo" id=""><br>
cp
    <input type="text" name="cp" value="43000" id=""><br>
municipio 
    <input type="text" name="municipio" value="Huejutla" id=""><br>
colonia
    <input type="text" name="colonia" id=""><br>
calle
    <input type="text" name="calle" id=""><br>
casa
    <input type="text" name="nc" id=""><br>
cantidad
    <input type="text" name="cv" id=""><br>
enfermedades
    <input type="text" name="enfermedades" value="Ninguna" id=""><br>
causas
    <input type="text" name="causa" id=""><br>
    <input type="submit" value="enviar">
    </form>
</body>
</html>
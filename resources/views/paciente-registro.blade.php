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
edad
    <input type="text" name="edad" id=""><br>
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
    tipo lesion
    <input type="text" name="tipo" id=""><br>
gravedad lesion
    <input type="text" name="gravedad" id=""><br>
aptitud fisica
    <input type="text" name="aptitud" id=""><br>
hipertencion
    <input type="text" name="hipertencion" value="" id=""><br>
lesiones previas 
    <input type="text" name="lesiones" value="" id=""><br>
osteoporosis
    <input type="text" name="osteoporosis" id=""><br>
migrañas
    <input type="text" name="mig" id=""><br>

cantidad
    <input type="text" name="cv" id=""><br>
imc
    <input type="text" name="imc" value="" id=""><br>
estatura
    <input type="text" name="estatura" value="" id=""><br>
causas
    <input type="text" name="causa" id=""><br>
    <input type="submit" value="enviar">
    </form>
</body>
</html>
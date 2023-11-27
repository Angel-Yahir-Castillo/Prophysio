<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>Fuera de linea</title>
</head>
<body>
    <div class="navbar-fixed">
        <nav style="background-color: #C7F7F7;" >
            <div class="nav-wrapper">
                <a href="{{ route('home')}}" class="brand-logo center black-text">Prophysio Huejutla</a>        
            </div>        
        </nav>
    </div>
    <center>
        <br><br>
        <h1>
            Actualmente estas fuera de linea 
        </h1>
        <br>
        <h3>
            Intenta volver a intentarlo cuando tengas conexion de nuevo
        </h3>
        <a href="{{route('home')}}" class="btn">Regresar al inicio</a>
        <br><br>
    </center>

    <footer class="page-footer" style="background-color: #C7F7F7;">
          <div class="container">
            <div class="row">
                <div class="col l4 m4 s12">
                    <h5 class="black-text"> Informacion</h5>
                    <ul>
                    <li><a class="black-text" href="{{ route('politica.privacidad') }}"><b>Politica de privacidad</b></a></li>
                    <li><a class="black-text" href="{{ route('preguntas.frecuentes') }}"><b>Preguntas frecuentes</b></a></li>
                    <li><a class="black-text" href="{{ route('terminos.condiciones') }}"><b>Terminos y condiciones</b></a></li>
                    </ul>
                </div>
              <div class="col l4 m4 s12">
                <h5 class="black-text">Contacto</h5>
                <ul>
                  <li><a class="black-text" href="{{ route('contacto.formulario') }}"><b>Correo electronico</b></a></li>
                  <li><p class="black-text text-lighten-3">Ubicacion: <br> Calle Coahulia. S/N. col. Tahuizan. Huejutla Hgo </p></li>
                  <li><p class="black-text text-lighten-3" >Telefono: +52 2225081501</p></li>
                </ul>
              </div>
              <div class="col l4 m4 s12">
                <h5 class="black-text">¿Quienes somos?</h5>
                <ul>
                  <li><a class="black-text" href="{{ route('quienes.somos') }}"><b>Mision y vision</b></a></li>
                  <li><a class="black-text" href="{{ route('servicios.mostrar') }}"><b>Servicios</b></a></li>
                  <li><a class="black-text" href="{{ route('quienes.somos') }}"><b>Especialistas</b></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class=" footer-copyright">
            <div class=" row container black-text">
              <div class="col section s12 m6">
                <p>© 2023 Prophysio Huejutla</p> 
              </div>
              <div class="col s4 m2 section">
                <a class="black-text text-lighten-4 " target="_blank" href="https://www.instagram.com/prophysio_huejutla/"> <img width="30px" height="30px" src="<?php echo asset('iconos/instagram.png')?>"></a>
              </div>
              <div class="col s4 m2 section">
                <a class="black-text text-lighten-4 " target="_blank"  href="https://www.facebook.com/prophysioof?mibextid=ZbWKwL"> <img width="30px" height="30px" src="<?php echo asset('iconos/facebook.png')?>"></a>
              </div>
              <div class="col s4 m2 section">
                <a class="black-text text-lighten-4 " target="_blank"href="https://api.whatsapp.com/send?phone=5212225081501&text=Hola%2C%20gracias%20por%20comunicarte%20a%20Prophysio%2C%20%C2%BFen%20qu%C3%A9%20podemos%20ayudarte%3F%20"> <img width="30px" height="30px" src="<?php echo asset('iconos/whatsapp.png')?>"></a>
              </div>
            </div>
          </div>
    </footer>
</body>
</html>
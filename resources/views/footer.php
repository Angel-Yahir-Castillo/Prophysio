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

    <title>Footer</title>
    
</head>

<body>

    <footer class="page-footer" style="background-color: #C7F7F7;">
          <div class="container">
            <div class="row">
                <div class="col l4 m4 s12">
                    <h5 class="black-text"> </h5>
                    <ul>
                    <li><a class="black-text text-lighten-3" href="#!">Politica de privacidad</a></li>
                    <li><a class="black-text text-lighten-3" href="#!">Preguntas frecuentes</a></li>
                    <li><a class="black-text text-lighten-3" href="#!">Terminos y condiciones</a></li>
                    </ul>
                </div>
              <div class="col l4 m4 s12">
                <h5 class="black-text">Contacto</h5>
                <ul>
                  <li><a class="black-text text-lighten-3" href="#!">Correo electronico</a></li>
                  <li><a class="black-text text-lighten-3" href="#!">Ubicacion</a></li>
                  <li><p class="black-text text-lighten-3" >Telefono: +52 2225081501</p></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container black-text">
            © 2022 Prophysio Huejutla
            <a class="black-text text-lighten-4 right" target="_blank" href="https://www.instagram.com/prophysio_huejutla/"> <img width="30px" height="30px" src="<?php echo asset('iconos/instagram.png')?>"></a>
            <a class="black-text text-lighten-4 right" target="_blank"  href="https://www.facebook.com/"> <img width="30px" height="30px" src="<?php echo asset('iconos/facebook.png')?>"></a>
            <a class="black-text text-lighten-4 right" href="#!"> <img width="30px" height="30px" src="<?php echo asset('iconos/whatsapp.png')?>"></a>
            </div>
          </div>
    </footer>
    

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>
</body>
</html>
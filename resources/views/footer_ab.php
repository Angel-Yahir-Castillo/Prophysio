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
                    <li><a class="" style="<?php if(request()->Is('politica-de-privacidad')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="<?php echo url('politica-de-privacidad')?>"><b>Politica de privacidad</b></a></li>
                    <li><a class="" style="<?php if(request()->Is('preguntas-frecuentes')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="<?php echo url('preguntas-frecuentes')?>"><b>Preguntas frecuentes</b></a></li>
                    <li><a class="" style="<?php if(request()->Is('terminos-y-condiciones')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="<?php echo url('terminos-y-condiciones')?>"><b>Terminos y condiciones</b></a></li>
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
              <div class="col l4 m4 s12">
                <h5 class="black-text">¿Quienes somos?</h5>
                <ul>
                  <li><a class="" style="<?php if(request()->Is('quienes-somos')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="<?php echo url('quienes-somos')?>"><b>Mision y vision</b></a></li>
                  <li><a class="" style="<?php if(request()->Is('servicios')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="<?php echo url('servicios')?>"><b>Servicios</b></a></li>
                  <li><a class="" style="<?php if(request()->Is('quienes-somos')) echo 'color: #E20089;'; else echo 'color:#000000;';?>" href="<?php echo url('quienes-somos')?>"><b>Especialistas</b></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class=" footer-copyright">
            <div class=" row container black-text">
              <div class="col section s12 m6">
                <p>© 2022 Prophysio Huejutla</p> 
              </div>
              <div class="col s4 m2 section">
                <a class="black-text text-lighten-4 " target="_blank" href="https://www.instagram.com/prophysio_huejutla/"> <img width="30px" height="30px" src="<?php echo asset('iconos/instagram.png')?>"></a>
              </div>
              <div class="col s4 m2 section">
                <a class="black-text text-lighten-4 " target="_blank"  href="https://www.facebook.com/"> <img width="30px" height="30px" src="<?php echo asset('iconos/facebook.png')?>"></a>
              </div>
              <div class="col s4 m2 section">
                <a class="black-text text-lighten-4 " target="_blank"href="https://api.whatsapp.com/send?phone=5212225081501&text=Hola%2C%20gracias%20por%20comunicarte%20a%20Prophysio%2C%20%C2%BFen%20qu%C3%A9%20podemos%20ayudarte%3F%20"> <img width="30px" height="30px" src="<?php echo asset('iconos/whatsapp.png')?>"></a>
              </div>
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
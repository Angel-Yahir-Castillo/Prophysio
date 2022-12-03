<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prophysio Huejutla - Agenda</title>
</head>

<body>
    <?php include 'header.php';?>

    <br><br><br>
    <div class="section container">

        <div class="row">

            <form action="" method="GET" class="col s12">

                <div class="row card-panel">

                    <center><b>Agendar una cita</b></center>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" name="nombre" class="validate" required>
                        <label for="nombre">Nombre completo:</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input id="registro_fecha" name="registro_fecha" type="text" class="datepicker validate" required>
                        <label for="registro_fecha">Fecha de nacimiento:</label>
                    </div>

                    <div class="input-field col s12 m6">
                        Sexo
                        <p>
                            <label>
                                <input class="with-gap validate" name="sexo" type="radio" checked/>
                                <span>Hombre</span>
                            </label>
                        </p>
                        <p>
                            <label>
                                <input class="with-gap validate" name="sexo" type="radio" />
                                <span>Mujer</span>
                        </label>
                        </p>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="peso" name="peso" type="number" class="validate" required>
                        <label for="peso">Peso:</label>
                    </div>

                    
                    <div class="input-field col m6 s12">
                        <input id="estatura" name="estatura" type="number" class="validate" required>
                        <label for="estatura">Estatura:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="correo" name="correo" type="email" class="validate" required>
                        <label for="correo">Correo electronico:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="telefono" name="telefono" type="tel" class="validate" required>
                        <label for="telefono">Telefono:</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <select>
                            <option value="" disabled selected>Tipo de terapia</option>
                            <option value="1">Masage</option>
                            <option value="2">Dolor de hombro</option>
                            <option value="3">Linfoterapia</option>
                        </select>
                        <label>Tipo de terapia</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <select>
                            <option value="" disabled selected>Terapeuta</option>
                            <option value="1">Lizbeth Mendoza</option>
                            <option value="2">Thania Rivera</option>
                            <option value="3">Monsserath Rojo</option>
                        </select>
                        <label>Terapeuta</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input id="registro_cita" name="registro_cita" type="text" class="datepicker validate" required>
                        <label for="registro_cita">Fecha para la cita:</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input id="hora_cita" name="hora_cita" type="text" class="timepicker validate" required>
                        <label for="hora_cita">Hora para la cita:</label>
                    </div>

                    <center><button class="btn" type="submit" value="">Agendar
                        <i class="material-icons left">
                            content_paste
                        </i>
                    </button></center>

                    <br>

                    

                </div>

                

            </form>
        </div>

    </div>
    <br><br><br>
    <?php include 'footer.php';?>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                format: 'dd mmm, yyyy',
                //i18n: cancel = 'cancelar',
            });
        });
    </script>
</body>
</html>
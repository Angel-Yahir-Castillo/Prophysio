<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
</head>
<body>
    <?php include ('header_admin.php'); ?>
    <br><br>
    <div class="section container">

        <div class="row">

            <form action="" method="GET" class="col s12">

                <div class="row card-panel">

                    <center><b>Registrar paciente</b></center>
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
                            <option value="" disabled selected>Tipos de terapia</option>
                            <option value="1">Masage</option>
                            <option value="2">Dolor de hombro</option>
                            <option value="3">Linfoterapia</option>
                        </select>
                        <label>Tipos de terapia</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="cant_tep" name="cant_tep" type="number" class="validate" required>
                        <label for="cant_tep">Cantidad de terapias necesarias:</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input id="padecimientos" type="text" name="padecimientos" class="validate" required>
                        <label for="padecimientos">Padecimientos / Alergias</label>
                    </div>

                    <div class="col s12 m6 file-field input-field">
                        <div class="btn blue">
                            <span>Fotografia 
                                <i class="large material-icons left">add_a_photo</i>
                            </span>
                            <input type="file" required>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" required type="text">
                        </div>
                    </div>

                    <h5>Datos de Direccion: </h5>

                    <div class="input-field col m4 s12">
                        <input id="cp" name="cp" type="number" class="validate" required>
                        <label for="cp">Codigo postal:</label>
                    </div>

                    <div class="input-field col s12 m4">
                        <select>
                            <option value="" disabled selected>Municipio</option>
                            <option value="1">Hujutla de Reyes</option>
                            <option value="2">Atlapexco</option>
                            <option value="3">San Felipe</option>
                        </select>
                        <label>Municipio</label>
                    </div>

                    <div class="input-field col s12 m4">
                        <select>
                            <option value="" disabled selected>Colonia</option>
                            <option value="1">5 de mayo</option>
                            <option value="2">Santa Irene</option>
                            <option value="3">Parque de poblamiento</option>
                        </select>
                        <label>Colonia</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <input id="calle" type="text" name="calle" class="validate" required>
                        <label for="calle">Calle:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="num_casa" name="num_casa" type="number" class="validate" required>
                        <label for="num_casa">Numero de casa:</label>
                    </div>

                    <center><button class="btn" type="submit" value="">Registrar
                        <i class="material-icons left">
                            person_add
                        </i>
                    </button></center>

                    <br>

                    

                </div>

                

            </form>
        </div>

    </div>
    <br><br><br>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                format: 'dd mmm, yyyy',
                i18n: {
                    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
                    weekdays: ["Domingo","Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                    weekdaysShort: ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    weekdaysAbbrev: ["D","L", "M", "M", "J", "V", "S"],
                    cancel : 'cancelar',
                    clear: 'limpiar'
                }
            });
        });
    </script>

</body>
</html>
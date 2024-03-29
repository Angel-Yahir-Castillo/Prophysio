@extends('user.plantilla_user')

@section('meta')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
@endsection

@section('title', ' Agendar - Prophysio Huejutla')

@section('content')

    
    <div class="section container">
    {{ Breadcrumbs::render('agendaUF') }}
        <div class="row">

            <form action="{{URL::secure('inicio/agendar/guardar')}}" method="POST" class="col s12">
                @csrf
                <div class="row card-panel">

                    <center><b>Agendar una cita</b></center>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" name="nombre" class="validate" required>
                        <label for="nombre">Nombre completo:</label>
                        <strong style="color: red;">@error('nombre') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="correo" name="correo" value="{{Auth::user()->email}}" type="email" readonly class="validate" required>
                        <label for="correo">Correo electronico:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="telefono" name="telefono" value="{{Auth::user()->phone}}" type="tel" readonly class="validate" required>
                        <label for="telefono">Telefono:</label>
                    </div>

                    <div class="input-field col s12 m6">
                        <select id="tipo" name="tipo">
                            @foreach ($tipos as $tipo)
                                <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                            @endforeach
                        </select>
                        <label>Tipo de terapia</label>
                        <strong style="color: red;">@error('tipo') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col s12 m6">
                        <select id="terapeuta" name="terapeuta">
                        <option value="0" disabled selected>Terapeuta</option>
                            @foreach ($terapeutas as $terapeuta)
                                <option value="{{$terapeuta->id}}">{{$terapeuta->nombres.' '.$terapeuta->a_paterno.' '.$terapeuta->a_materno}}</option>
                            @endforeach
                        </select>
                        <label>Terapeuta</label>
                        <strong style="color: red;">@error('terapeuta') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="dia" type="text" name="dia" class="validate" placeholder=""
                        pattern="\d{4}-\d{2}-\d{2}" title="Seleccione una fecha" readonly required>
                        <label for="dia">Fecha de la cita:</label>
                        <strong style="color: red;">@error('dia') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="hora" type="text" name="hora" class="validate" placeholder=""
                        pattern="\d{4}-\d{2}-\d{2}" title="Seleccione una fecha"  readonly required>
                        <label for="hora">Hora de la cita:</label>
                        <strong style="color: red;">@error('hora') {{ $message }} @enderror</strong> 
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
        <div class="row">
            <div class="col s12"><center><b>Selecciona un terapeuta para poder elejir un dia para la cita</b></center></div>
            <div class="col s12" id='calendar'></div>
        </div>
    </div>

    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Selecciona una hora para la cita</h4>
            <div class="row" id="modalContent"></div>
        </div>
    </div>

    <br><br><br>

@endsection

@section('scripts_styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.css">

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/main.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.5/locales-all.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems, options);
        });

        var horasDisponibles = null;
        function opcionCambiada(){
            if($terapeuta.value!==0){
                verCalendario();
            }
        };
        const $terapeuta = document.getElementById('terapeuta')
        $terapeuta.addEventListener("change", opcionCambiada);


        function verCalendario() {
            var hoy = moment().format('YYYY-MM-DD');
            var unMesDespues = moment().add(1, 'months').format('YYYY-MM-DD');
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                selectable: true, // Permite la selección de días
                validRange: {
                    start: hoy,
                    end: unMesDespues
                },
                locale: 'es',
                dateClick:async function(info){
                    var fechaHora = moment(info.dateStr);
                    var $fecha = fechaHora.format('YYYY-MM-DD');
                    
                    try {
                        const data = { 'fecha': $fecha, 'terapeuta': $terapeuta.value };
                        const urlLo= `http://127.0.0.1:8000/api/obtenerHoras`;
                        const urlHost= `https://prophysio.tagme.uno/public/api/obtenerHoras`;
                        const urlAzure = `https://prophysio.azurewebsites.net/api/obtenerHoras`;
                        const response = await axios.post(urlAzure,data);
                        horasDisponibles = response.data;
                        //console.log(horasDisponibles);
                        document.getElementById('dia').value=$fecha;
                        document.getElementById('hora').value='';
                        mostrarHorasDisponibles();
                    } catch (error) {
                        alert('Se ha producido un error inesperado');
                    }
                },
            });

            calendar.render();
        };

        function mostrarHorasDisponibles() {
            const elem = document.getElementById('modal1');
            var instance = M.Modal.getInstance(elem);
            // Llenar la ventana modal con las horas disponibles
            var modalContent = document.getElementById('modalContent');
            modalContent.innerHTML = ''; // Limpiar el contenido anterior

            horasDisponibles.forEach(function(hora) {
                // Crea un botón para cada hora disponible y lo añade al modal
                var btnHora = document.createElement('button');
                btnHora.textContent = hora;
                btnHora.classList.add('btn', 'btn-primary');
                btnHora.onclick = function() {
                    // Captura la hora seleccionada
                    var horaSeleccionada = hora;
                    // Haz lo que necesites con la hora seleccionada, como guardarla en una variable global
                    //console.log('Hora seleccionada:', horaSeleccionada);
                    // Cerrar la ventana modal
                    instance.close();
                    document.getElementById('hora').value=hora;
                };
                modalContent.appendChild(btnHora);
                modalContent.appendChild(document.createElement('br'));
            });

            // Mostrar la ventana modal
            instance.open();
        }
    

    </script>

@endsection
@extends('user.plantilla_user')

@section('meta')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js'></script>
@endsection

@section('title', ' Reagendar cita - Prophysio Huejutla')

@section('content')

    
    <div class="section container">
    {{ Breadcrumbs::render('agendaU') }}
        <div class="row">

            <form action="{{URL::secure('inicio/cita/update')}}" method="POST" class="col s12">
                @csrf
                <div class="row card-panel">

                    <center><b>Reagendar una cita</b></center>
                    <div class="input-field col s12">
                        <input id="folio" type="hidden" name="folio" value="{{$cita['folio']}}"readonly class="validate" required>
                    </div>
                    <div class="input-field col s12">
                        <input id="paciente" type="text" name="paciente" value="{{$cita['paciente']}}"readonly class="validate" required>
                        <label for="paciente">Paciente:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="terapeuta" name="terapeuta" value="{{$cita['terapeuta']}}" type="text" readonly class="validate" required>
                        <label for="terapeuta">Terapeuta:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="tipo" name="tipo" value="{{$cita['terapia']}}" type="text" readonly class="validate" required>
                        <label for="tipo">Tipo de terapia:</label>
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="dia" type="text" name="dia" class="validate" placeholder=""
                        pattern="\d{4}-\d{2}-\d{2}" title="Seleccione una fecha" readonly required>
                        <label for="dia">Nueva fecha para la cita:</label>
                        <strong style="color: red;">@error('dia') {{ $message }} @enderror</strong> 
                    </div>

                    <div class="input-field col m6 s12">
                        <input id="hora" type="text" name="hora" class="validate" placeholder=""
                        pattern="\d{4}-\d{2}-\d{2}" title="Seleccione una fecha"  readonly required>
                        <label for="hora">Nueva hora para la cita:</label>
                        <strong style="color: red;">@error('hora') {{ $message }} @enderror</strong> 
                    </div>

                    <center><button class="btn" type="submit" value="">Reagendar
                        <i class="material-icons left">
                            content_paste
                        </i>
                    </button></center>

                    <br>

                </div>

            </form>
        </div>
        <div class="row">
            <div class="col s12"><center><b>Selecciona un dia para la cita</b></center></div>
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
            var instances = M.Modal.init(elems);
        });

        var horasDisponibles = null;
        
        const $terapeuta = "{{$cita['terapeuta_id']}}" ;

        verCalendario();
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
                        const data = { 'fecha': $fecha, 'terapeuta': $terapeuta };
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
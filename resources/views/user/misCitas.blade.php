@extends('user.plantilla_user')

@section('meta')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection

@section('title', ' Mis citas - Prophysio Huejutla')

@section('content')

    
    <div class="section container">
    {{ Breadcrumbs::render('agendaU') }}
    <br><br>
        <div class="row">
            <div class="col s1 m7"></div>
            <div class="col s11 m5">
                <a href="{{route('user.agendar.cita.form')}}" class="btn-large waves-effect waves-light white-text" style="background-color: #e20089;">Agendar cita
                    <i class="material-icons left white-text">create</i></a>
            </div>
        </div>
        @if (count($citas) == 0)
            <div class="row"> 
                <center><b>Sin proximas citas</b></center>
            </div>
        @else
            @foreach ($citas as $cita)
                <div class="row z-depth-2 section">
                    <div class="col s12 m7 l7">
                        <h5><b>Dia: {{$cita['dia']}}</b></h5>
                        <h5><b>Hora: {{$cita['hora']}}</b></h5>
                        <h5>Nombre del paciente: {{$cita['paciente']}}</h5>
                        <h5><b>Terapeuta: {{$cita['terapeuta']}}</b></h5>
                        <h5>Tipo de terapia: {{$cita['terapia']}}</h5>
                        <h5>Folio: {{$cita['folio']}}</h5>
                    </div>
                    <div class="col s12 m5 l5">
                        <div class="row" style="height:100%">
                            <br><br>
                            <div class="col s12 m12">
                                <center><a href="{{route('user.cita.mostrar', $cita['folio'])}}" class="btn waves-effect waves-light black-text" style="background-color: #C7F7F7;">Reagendar
                                    <i class="material-icons left black-text">edit</i></a>
                                </center>
                            </div>
                            <br><br><br>
                            <div class="col s12 m12">
                                <center><button onclick="cancelarCita(`{{$cita['folio']}}`)" class="btn waves-effect waves-light red black-text">Cancelar
                                    <i class="material-icons left black-text">cancel</i></button>
                                </center> 
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>¿Estas seguro que quieres cancelar la cita?</h4>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="textarea2" class="materialize-textarea" data-length="120"></textarea>
                    <label for="textarea2">Escribe el motivo de cancelacion:</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="modal-close waves-effect waves-green btn-flat" onclick="no()">No cancelar</button>
            <button href="#!" class="modal-close waves-effect waves-green btn-flat" onclick="si()">Cancelar</button>
        </div>
    </div>

    <div id="modal2" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Se ha registrado tu cita correctamente</h4>
            <div class="row">
                <div class="col s12">
                    <center>
                        <br><br>
                        <p>El folio para tu cita es: <b id="folioCita"> </b>, con este folio podras consultar la informacion de tu cita</p>
                        <p>Para tu cita recuerda acudir con ropa comoda</p>
                    </center>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="modal-close waves-effect waves-green btn-flat">Aceptar</button>
        </div>
    </div>
@endsection

@section('scripts_styles')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });

        var cancelar = false;
        var folio = null;

        function si(){
            cancelar = true;
            cancelarFuncion();
        }
        function no(){
            cancelar = false;
        }

        function cancelarCita(folioSeleccionado){
            folio = folioSeleccionado;
            const elem = document.getElementById('modal1');
            var instance = M.Modal.getInstance(elem);
            instance.open();
        }

        async function cancelarFuncion(){
            if(cancelar){
                try {
                const urlLo= `http://127.0.0.1:8000/api/cancelarCita`;
                const urlHost= `https://prophysio.tagme.uno/public/api/cancelarCita`;
                const urlAzure = `https://prophysio.azurewebsites.net/api/cancelarCita`;
                const response = await axios.get(urlAzure+'?folio='+folio); 
                const respuesta = response.data;
                if(respuesta.response === '2'){
                    alert('Se cancelo la cita');
                    window.location.reload();
                }
                else{
                    alert('Ocurrio un error al cancelar la cita');
                }
                } catch (error) {
                    console.error(error);
                }
                cancelar = false;
            }
        }
    </script>

    <script>
        // Función para programar la notificación un día antes de la cita (incluyendo la hora)
        function programarNotificacion(fecha) {
            // Obtener la fecha y hora de la cita
            var fechaCita = new Date(fecha); // Crear objeto de fecha sin modificarlo

            // Obtener la fecha y hora actual
            const fechaActual = new Date();

            // Calcular la diferencia entre la fecha de la cita y la fecha actual en milisegundos
            const diferenciaTiempo = fechaCita.getTime() - fechaActual.getTime();

            const unDiaEnMilisegundos = 24 * 60 * 60 * 1000; // 24 horas en milisegundos

            // Calcular el tiempo para la notificación
            const tiempoNotificacion = diferenciaTiempo - unDiaEnMilisegundos;
            console.log('Tiempo para notificación:', tiempoNotificacion);

            // Si el tiempo para la notificación es mayor a cero, programar la notificación
            if (tiempoNotificacion > 0) {
                setTimeout( enviarNotificacion(
                    'Recordatorio de cita',
                    'Tienes una cita programada en las próximas 24 horas. Recuerda acudir con ropa cómoda a tu consulta.',
                    'https://prophysio.azurewebsites.net/inicio/mis-citas'
                ), tiempoNotificacion);
            }
            else{
                enviarNotificacion(
                    'Recordatorio de cita',
                    'Tienes una cita programada en las próximas 24 horas. Recuerda acudir con ropa cómoda a tu consulta.',
                    'https://prophysio.azurewebsites.net/inicio/mis-citas'
                )
            }
        }
    </script>

    @if (session('info'))
        <script>
            function mostrarFolio() {
                document.getElementById('folioCita').innerHTML = '{{ session("info")[0] }} ';
                const ventanaFolio = document.getElementById('modal2');
                var instance = M.Modal.getInstance(ventanaFolio);
                instance.open();
            }
            setTimeout(mostrarFolio, 1500);

            enviarNotificacion('Se registro tu cita correctamente','Click aqui para ver tus citas agendadas','https://prophysio.azurewebsites.net/inicio/mis-citas');
            
            setTimeout(enviarNotificacion('Muchas gracias por tu preferencia','Puedes ayudarnos respondiendo una encuesta rapida','https://prophysio.azurewebsites.net/inicio/encuesta'), 4000);
            programarNotificacion('{{ session("info")[1] }} ');
        </script>
    @endif

    @if (session('actualizacion'))
        <script>
            M.toast({
                html: '{{ session("actualizacion")}} ',
                classes: 'black',
                displayLength: 4000,
            })
        </script>
    @endif
@endsection
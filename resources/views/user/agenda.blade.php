@extends('user.plantilla_user')

@section('meta')

@endsection

@section('title', 'Prophysio Huejutla - Agendar')

@section('content')

    
    <div class="section container">
    {{ Breadcrumbs::render('agendaU') }}
        <div class="row">

            <form action="" method="POST" class="col s12">
                @csrf
                <div class="row card-panel">

                    <center><b>Agendar una cita</b></center>
                    <div class="input-field col s12">
                        <input id="nombre" type="text" name="nombre" class="validate" required>
                        <label for="nombre">Nombre completo:</label>
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
        <div class="row">
            <div class="col s12" id='calendar'></div>
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
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            slotMinTime: '08:00',
            slotMaxTime: '20:00',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: @json($events),
            locale: 'es', // Establece el idioma español 
        });
        calendar.render();
        });
    </script>

@endsection
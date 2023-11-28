@extends('admin.plantilla_admin')

@section('meta')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
@endsection

@section('title', 'Panel Administrador')

@section('content')
    <div class="container">
        <h1>Panel administrador</h1>

        <div class="row">
            <h3>Experiencia al agendar citas</h3>
            <div class="col s12">
                <table class="striped responsive-table">
                    <thead>
                        <tr>
                            <th>Nivel de satisfaccion</th>
                            <th>Recomendacion</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($encuestas as $encuesta)
                            <tr>
                                @if ($encuesta->calificacion == 2 )
                                    <th>Buena</th>
                                @elseif ($encuesta->calificacion == 1 )
                                    <th>Regular</th>
                                @else 
                                    <th>Mala</th>
                                @endif
                                
                                <th>{{$encuesta->comentario}}</th>
                                <th>{{$encuesta->created_at}}</th>
                            </tr>
                        @endforeach
                        
                    </tbody>

                </table>
                <center> {{ $encuestas->links() }} </center>
            </div>
            <div class="col s12">
                <canvas id="miGrafico" width="200" height="200"></canvas>
            </div>
        </div>
        
    </div>

@endsection

@section('scripts_styles')
    <script>
        var ctx = document.getElementById('miGrafico').getContext('2d');
        var datos =  {!! json_encode($total) !!} ;
        var tiempo = 'utimas 2 semanas';

        var miGrafico = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Buena','Regular', 'Mala'],
                datasets: [{
                    label: 'Nivel de satisfaccion al agendar una cita',
                    data: datos,
                    backgroundColor: '#C7F7F7',
                    borderColor: '#017bc6',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
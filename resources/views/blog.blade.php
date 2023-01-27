@extends('plantilla_visit')

@section('title', 'Prophysio Huejutla - Blog')

@section('content')

    <div class="container section">
    {{ Breadcrumbs::render('blog') }}
        <div class="row">

          
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img class="" src="{{ asset('blog_images/lesion_prophysio.png') }}">
                    </div>

                    <div class="card-content">
                        <span class="card-title">¿Es necesario tener una lesion para ir a Prophysio?</span>
                        <p>
                            La respuesta es: ¡NO! Aquí también te ayudamos a prevenir una lesión para que tu nivel físico sea el mejor. <br>
                            ¡Ven a una valoración!<br>
                            ¡Cuida de tu cuerpo!<br>
                            ¡Agenda tu cita!<br>
                            Tu salud es nuestra prioridad
                        </p>
                    </div>

                    <div class="card-action">
                        <a href="#"> Cuida tu salud</a>
                    </div>

                </div>
            </div> 

            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img class="" src="{{ asset('blog_images/bursitis.png') }}">
                    </div>

                    <div class="card-content">
                        <span class="card-title">¿Que es la bursitis?</span>
                        <p>Sabias que…!!
                            La bursitis es la inflamación de las almohadillas llenas de líquido (bolsas sinoviales) que funcionan como amortiguadores en las articulaciones, suele ocurrir en las articulaciones que hacen movimientos frecuentes y repetitivos.</p>
                    </div>

                    <div class="card-action">
                        <a href="#"> ¿Sabias que?...</a>
                    </div>

                </div>
            </div>

            

            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img class="" src="{{ asset('blog_images/dolor_lumbar.png') }}">
                    </div>

                    <div class="card-content">
                        <span class="card-title">¿Como prevenir el dolor lumbar?</span>
                        <p> !!!!Les compartimos acciones sencillas que ayudan a prevenir el dolor en la zona lumbar. </p>
                            
                                <li type="disc"> Apoya la espalda al sentarte.</li>
                                <li type="disc"> Mantén posturas adecuadas al estar sentado o acostado.</li>
                                <li type="disc"> No cargues objetos pesados.</li>
                                <li type="disc"> Realizar ejercicio físico.</li>
                                <li type="disc"> Realiza pausas activas entre tus actividades.</li>
                            
                        
                    </div>

                    <div class="card-action">
                        <a href="#"> Cuida tu salud</a>
                    </div>

                </div>
            </div>

            
            

        

            <!--
            <div class="col s12 m6 l5">
                <div class="card">
                    <div class="card-image">
                        <img class="responsive-img" src="<?php echo asset('blog_images/rodillas.png')?>">
                    </div>

                    <div class="card-content">
                        <span class="card-title">Factores que generan dolor de rodillas</span>
                        <p>
                        Hola amigos! El día de hoy les compartimos algunos de los factores que pueden incrementar el riesgo de padecer dolor de rodillas: <br>
                            <ul>
                                <li>- Sobrepeso</li>
                                <li>- Falta de flexibilidad y fuerza muscular</li>
                                <li>- Actividades deportivas de alto impacto</li>
                                <li>- Lesiones previas</li>
                            </ul>
                            No dejes que el dolor pare tu ritmo de vida, acude con nosotros!<br>
                            Tu salud es nuestra prioridad
                        </p>
                    </div>

                    <div class="card-action">
                        <a href="#"> Cuida tu salud</a>
                        <a href="#"> ¿Sabias que? ...</a>
                    </div>

                </div>
            </div> -->

            
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image">
                        <img class="" src="{{ asset('blog_images/sedentarismo.png') }}">
                    </div>

                    <div class="card-content">
                        <span class="card-title">Sedentarismo</span>
                        <p>
                            ¿Qué es el sedentarismo? Y ¿Cómo afecta el sedentarismo en mi salud?<br>
                            <li>El sedentarismo es las carencia de actividad física fuerte como el deporte, lo que por lo general pone al organismo humano en situación vulnerable ante enfermedades especialmente cardiacas y sociales.</li>
                            <li>El sedentarismo dificulta el desarrollo óseo normal de la columna vertebral, conlleva a una perdida de la fuerza y de resistencia muscular y hace que la espalda sea más vulnerable al exceso de carga.</li>
                            ¡DECIDE MOVERTE!<br>
                        </p>
                    </div>

                    <div class="card-action">
                        <a href="#"> Cuida tu salud</a>
                    </div>

                </div>
            </div> 


        </div>


    </div>

    @endsection
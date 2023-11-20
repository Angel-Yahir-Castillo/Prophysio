@extends('user.plantilla_user')

@section('meta')

@endsection

@section('title', 'Prophysio Huejutla')

@section('content')

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div id="modal1" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4 class="">Encuesta de satisfaccion</h4>
            <form action="{{ URL::secure('inicio/encuesta/guardar') }}"  method="POST">
            @csrf 
                <div class="row">
                    <div class="input-field col s12 m6">
                        <b>Nivel de satisfaccion al agendar una cita:</b> 
                        <p>
                            <i class="material-icons left">sentiment_very_dissatisfied</i>
                            <label>
                                <input class="with-gap validate" value="0" name="calificacion" type="radio"/>
                                <span>Mala</span>
                            </label>
                        </p>
                        <p>
                            <i class="material-icons left">sentiment_satisfied</i>
                            <label>
                                <input class="with-gap validate" value="1" name="calificacion" type="radio" />
                                <span>Regular</span>
                            </label>
                        </p>
                        <p>
                            <i class="material-icons left">sentiment_very_satisfied</i>
                            <label>
                                <input class="with-gap validate" value="2" name="calificacion" type="radio" checked/>
                                <span>Buena</span>
                            </label>
                        </p>
                    </div>
                    <div class="input-field col s12">
                        <textarea id="textarea2" name="comentario" class="materialize-textarea" data-length="120"></textarea>
                        <label for="textarea2">Comentario o recomendacion:</label>
                    </div>
                    <div class="col s12">
                        <button class="btn waves-effect waves-green" type="submit">Enviar encuesta</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</button>
        </div>
    </div>

@endsection

@section('scripts_styles')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems,{
                onCloseEnd: function() {
                    window.location.href = 'https://prophysio.azurewebsites.net/inicio/';
                }
            });
        });

        var instance;
        setTimeout(function(){
            const elem = document.getElementById('modal1');
            instance = M.Modal.getInstance(elem);
            instance.open();
        }, 1000);
        
    </script>
@endsection


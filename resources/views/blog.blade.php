@extends('plantilla_visit')

@section('meta')
    
@endsection

@section('title', 'Prophysio Huejutla - Blog')

@section('content')

    <div class="container section">
        <div class="row">
            <form id="busquedaA" action="" method="" class="col s12">
                <div class="row">
                    <div class="input-field col s7">
                        <select id="etiquetasLista" name="categoria"> 
                            <option selected value="all">TODOS</option>
                            @foreach ($etiquetas as $etiqueta)
                                <option value="{{$etiqueta->id}}">{{$etiqueta->nombre}}</option>
                            @endforeach
                        </select>
                        <label>Etiquetas</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
        {{ Breadcrumbs::render('blog') }}
        </div>

        <div id="blogs" class="row">

        </div>
    </div>

    <style>
        .contBlog{
            transition: all 300ms;
        }
        .contBlog:hover{
            transform: scale(1.10);
        }
        .enlace{
            background-color: white;
            border: 0px;
            color: #FFB219;
        }
        .enlace:hover{
            cursor: pointer;
        }
    </style>
    <script type="" src="{{asset('js/blog.js')}}"></script>

    <script>
        //obtenerEtiquetas();
        verBlogs();
        
    </script>

    @endsection
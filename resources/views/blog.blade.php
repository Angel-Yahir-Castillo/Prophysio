@extends('plantilla_visit')

@section('meta')
    <script type="" src="{{asset('js/blog.js')}}"></script>
@endsection

@section('title', 'Prophysio Huejutla - Blog')

@section('content')

    <div class="container section">
    {{ Breadcrumbs::render('blog') }}
        <div id="blogs" class="row">

        </div>
    </div>

    <script>
        verBlogs();
    </script>

    @endsection
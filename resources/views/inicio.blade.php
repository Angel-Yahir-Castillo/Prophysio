@extends('plantilla_visit')

@section('title', 'Prophysio Huejutla')

@section('content')
    <br><br>
    <div class="container section">
        <div class="row">
            <div class="col s12">

                <div class="slider">

                    <ul class="slides">
                        <li>
                            <img src="<?php echo asset('slider/slider01.JPG')?>"> 
                        </li>
                        <li>
                            <img src="<?php echo asset('slider/slider02.JPG')?>"> 
                        </li>
                        <li>
                            <img src="<?php echo asset('slider/slider03.jpeg')?>"> 
                        </li>
                    </ul>
                </div>



                <!-- opcion uno de carousel
                <div class="carousel carousel-slider">
                    <a class="carousel-item" href="#"><img src="<?php echo asset('slider/slider01.JPG')?>"></a>
                    <a class="carousel-item" href="#"><img src="<?php echo asset('slider/slider02.JPG')?>"></a>
                    <a class="carousel-item" href="#"><img src="<?php echo asset('slider/slider03.jpeg')?>"></a>
                </div>-->
            </div>
        </div>

    </div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.slider');
            var instances = M.Slider.init(elems,{
                duration: 600,
                interval: 3000,
                height: 750
            });
        });
        
        /*document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.carousel');
            var instances = M.Carousel.init(elems, {
                duration: 500,
                indicators: true,
                fullWidth: true
            });
        });*/

    </script>
@endsection
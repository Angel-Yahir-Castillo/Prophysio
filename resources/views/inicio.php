<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prophysio Huejutla</title>
</head>

<body>
    <?php include 'header.php';?>

    <?php echo Breadcrumbs::render('home')?>
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
    <br><br>
    <?php include 'footer.php';?>
</body>
</html>

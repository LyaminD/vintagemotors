@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vintage Motors</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


<body>
    <div id="loginBackground">

        <h3>Bienvenu sur Vintage Motors ! ! !</h3>
        <div class="container">
            <div class="tribunal text-center my-3">
                <img src="{{ asset("images/vintagemotors.png") }}" class="img-thumbnail">
            </div>
        </div>
    </div>


    <div>
        <h3>Découvrez nos promos en cours !</h3>
    </div>

    <div>
        <h3>Showroom de nos plus belles motos !</h3>
        <div class="container carousel">
            <div class="row">
                <div class="col-md-12">
                    <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                        <!-- slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active"> <img src="/images/showroom1.jpg" alt="showroom1"> </div>
                            <div class="carousel-item"> <img src="/images/showroom2.jpg" alt="showroom2"> </div>
                            <div class="carousel-item"> <img src="/images/showroom3.jpg" alt="showroom3"> </div>
                            <div class="carousel-item"> <img src="/images/showroom4.jpg" alt="showroom4"> </div>
                            <div class="carousel-item"> <img src="/images/showroom5.jpg" alt="showroom5"> </div>
                            <div class="carousel-item"> <img src="/images/showroom6.jpg" alt="showroom6"> </div>
                            <div class="carousel-item"> <img src="/images/showroom7.jpg" alt="showroom7"> </div>
                        </div>
                        <!-- Left right -->
                        <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                        <ol class="carousel-indicators list-inline">
                            <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="/images/showroom1.jpg" class="img-fluid"> </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel"> <img src="/images/showroom2.jpg" class="img-fluid"> </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel"> <img src="/images/showroom3.jpg" class="img-fluid"> </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="3" data-target="#custCarousel"> <img src="/images/showroom4.jpg" class="img-fluid"> </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-3" data-slide-to="4" data-target="#custCarousel"> <img src="/images/showroom5.jpg" class="img-fluid"> </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-4" data-slide-to="5" data-target="#custCarousel"> <img src="/images/showroom6.jpg" class="img-fluid"> </a> </li>
                            <li class="list-inline-item"> <a id="carousel-selector-5" data-slide-to="6" data-target="#custCarousel"> <img src="/images/showroom7.jpg" class="img-fluid"> </a> </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div>
        <h3>Les motos les mieux notées !</h3>
    </div>












</body>

</html>
@endsection
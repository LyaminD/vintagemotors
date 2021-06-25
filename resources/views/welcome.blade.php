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

        <h1>Bienvenu sur Vintage Motors ! ! !</h1>
        <div class="container">
            <div class="tribunal text-center my-3">
                <img src="{{ asset("images/vintagemotors.png") }}" class="img-thumbnail">
            </div>
        </div>
       
    </div>
</body>

</html>
@endsection
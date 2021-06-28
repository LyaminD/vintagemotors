@extends('layouts.app')

@section('content')

<body>
    <div class="card" style="width: 18rem;">
        <img src="{{ asset("images/$article->image") }}" class="card-img-top" alt="moto">
        <div class="card-body">
            <h5 class="card-title"> {{ $article->nom}}</h5>
            <p class="card-text"> {{ $article->description}}</p>
            <p class="card-text"> {{ $article->description_detaillee}}</p>
            <p class="card-text"> @php Helpers($article->stock) @endphp</p>
            <p class="card-text"> {{ $article->prix}} Euros</p>
            <p class="card-text"> {{ $article->note}}</p>
            <a href="#" class="btn btn-primary">Acheter</a>
        </div>
    </div>
</body>
@endsection
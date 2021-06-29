@extends('layouts.app')

@section('content')

<body>
    @foreach ($articles as $article)

    <div class="card" style="width: 18rem;">
        <img src="{{ asset("images/$article->image") }}" class="card-img-top" alt="moto">
        <div class="card-body">
            <h5 class="card-title"> {{ $article->nom}}</h5>
            <p class="card-text"> {{ $article->description}}</p>
            <p class="card-text"> <i class="fas fa-box-open fa-2x mr-2"></i>@php DisplayStock($article->stock) @endphp</p>
            <p class="card-text"> {{ $article->prix}} Euros</p>
            <a href="{{ route('articles.show',$article)}}" class="btn btn-primary">Plus de détails</a>
            <a href="{{ route('panier.add')}}" class="btn btn-primary">Acheter</a>
        </div>
    </div>
    @endforeach
</body>
@endsection
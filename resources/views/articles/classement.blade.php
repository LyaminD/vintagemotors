@extends('layouts.app')

@section('content')

<body>
    @foreach ($classement as $article)
    <div class="card my-5" style="width: 18rem;">
        <img src="{{ asset("images/$article->image") }}" class="card-img-top" alt="moto">
        <div class="card-body">
            <h5 class="card-title"> {{ $article->nom}}</h5>
            <p class="card-text"> {{ $article->description}}</p>
            <p class="card-text"> <i class="fas fa-box-open fa-2x mr-2"></i>@php DisplayStock($article->stock) @endphp</p>
            <p class="card-text"> {{ $article->prix}} Euros</p>
            <p class="card-text"> {{ $article->note}}</p>
            <a href="{{ route('articles.show',$article)}}" class="btn btn-primary">Plus de détails</a>
        </div>
    </div>
    <form action="{{ route('panier.add',$article)}}" method="post">
        @CSRF
        <input type="number" name="quantite">
        <input type="hidden" value="" name="{{$article}}">
        <input type="submit" value="acheter" class="btn btn-primary mb-2 mt-2">
    </form>

    <form action="" method="post">
        @CSRF
        <input type="hidden" value="" name="{{$article}}">
        <input type="submit" value="ajouter aux favoris" class="btn btn-primary mb-2 mt-2">
    </form>
    @endforeach
</body>
@endsection
@extends('layouts.app')

@section('content')

<body>
    <div class="card my-5" style="width: 18rem;">
        <img src="{{ asset("images/$article->image") }}" class="card-img-top" alt="moto">
        <div class="card-body">
            <h5 class="card-title"> {{ $article->nom}}</h5>
            <p class="card-text"> {{ $article->description}}</p>
            <p class="card-text"> {{ $article->description_detaillee}}</p>
            <p class="card-text"> <i class="fas fa-box-open fa-2x mr-2"></i>@php DisplayStock($article->stock) @endphp</p>
            <p class="card-text"> {{ $article->prix}} Euros</p>
            <p class="card-text"> {{ $article->note}}</p>
            <a href="{{ route('panier.add',$article)}}" class="btn btn-primary">Acheter</a>

        @if(auth()->user()!== null)
            @if(in_array($article->id,$favorisIds))
            <form action="{{route('favoris.destroy',$article)}}" method="post">
                @CSRF
                @method('delete')
                <input type="hidden" value="{{$article->id}}" name="article_id">
                <input type="submit" value="retirer des favoris" class="btn btn-danger mb-2 mt-2">
            </form>
            @else
                <form action="{{route('favoris.store',$article)}}" method="post">
                @CSRF
                <input type="hidden" value="{{$article->id}}" name="article_id">
                <input type="submit" value="ajouter aux favoris" class="btn btn-primary mb-2 mt-2">
            </form>
            @endif
        @endif
        </div>
    </div>
</body>
@endsection
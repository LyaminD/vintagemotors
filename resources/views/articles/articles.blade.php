@extends('layouts.app')

@section('content')

<body>
    <div class="row">
        @foreach ($articles as $article)
        <div class="col-4 justify-content-around">
            <div class="card my-5" style="width: 30rem; ">
                <img src="{{ asset("images/$article->image") }}" class="card-img-top" alt="moto">
                <div class="card-body">
                    <h5 class="card-title"> {{ $article->nom}}</h5>
                    <p class="card-text"> {{ $article->description}}</p>
                    <p class="card-text"> <i class="fas fa-box-open fa-2x mr-2"></i>@php DisplayStock($article->stock) @endphp</p>
                    <p class="card-text"> {{ $article->prix}} Euros</p>
                    <a href="{{ route('articles.show',$article)}}" class="btn btn-primary my-2">Plus de détails</a>
                    <form action="{{ route('panier.add',$article)}}" method="post">
                        @CSRF
                        <input type="number" name="quantite">
                        <input type="hidden" value="" name="{{$article}}">
                        <input type="submit" value="acheter" class="btn btn-primary mb-2 mt-2">
                    </form>
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
        </div>
        @endforeach
    </div>
</body>
@endsection
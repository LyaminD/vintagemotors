@extends('layouts.app')

@section('content')
<script>
    function showAvisForm() {
        var form = document.getElementById("sectionAvis");
        if (form.style.display == "block") {
            form.style.display = "none";
        } else {
            form.style.display = "block";
        }
    }
</script>

<body>
    <div class="row">
        <div class="col">
            <div class="card my-5" style="width: 18rem;">
                <img src="{{ asset("images/$article->image") }}" class="card-img-top" alt="moto">
                <div class="card-body">
                    <h5 class="card-title"> {{ $article->nom}}</h5>
                    <p class="card-text"> {{ $article->description}}</p>
                    <p class="card-text"> {{ $article->description_detaillee}}</p>
                    <p class="card-text"> <i class="fas fa-box-open fa-2x mr-2"></i>@php DisplayStock($article->stock) @endphp</p>
                    <p class="card-text"> {{ $article->prix}} Euros</p>
                    <p class="card-text">Note : {{ $article->note}} étoiles</p>
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
                <button class="btn btn-lg btn-primary" onclick="showAvisForm()">Donnez votre avis</button>
            </div>
        </div>
        <div class="col text-white  my-5">
            <h4>Les avis des clients</h4>
            @foreach ($article->avis as $avis)
            <p class="card-text "> {{ $avis->user->prenom}}</p>
            <p class="card-text "> {{ $avis->avis}}</p>
            <p class="card-text "> {{ $avis->note}}</p>
            @endforeach
        </div>
        <div class="col">
            <div class="container d-flex justify-content-center my-5">
                <div class="row">
                    <div class="col">
                        <div class="stars" id="sectionAvis">
                            <form action="{{ route('avis.store') }}" method="post">
                                @CSRF
                                <textarea rows="5" cols="33" name="avis"> </textarea>
                                <input type="hidden" name="article_id" value="{{$article->id}}">
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                <input class="star star-5" id="star-5" type="radio" name="note" value="5" /> <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" type="radio" name="note" value="4" /> <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" name="note" value="3" /> <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" type="radio" name="note" value="2" /> <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" id="star-1" type="radio" name="note" value="1" /> <label class="star star-1" for="star-1"></label>
                                <input type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection
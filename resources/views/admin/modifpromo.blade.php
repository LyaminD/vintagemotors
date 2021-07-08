@extends('layouts.app')

@section('content')
<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-sm-12 col-xs-12">
                <div class="card p-4 p-md-4 my-4 mx-3 mx-md-0 text-white">
                    <h6>Hi!</h6>
                    <p>One of our consultants will assist you as soon as they can!</p>
                    <form>
                        <div class="form-group"> <label> Name </label> <input type="text" class="form-control"> </div>
                        <div class="form-group"> <label> Email </label> <input type="email" class="form-control"> </div>
                        <div class="form-group"> <label> Phone Number (optional) </label> <input type="number" class="form-control"> </div>
                        <div class="form-group"> <label> Message </label> <input type="text" height="30px" class="form-control"> </div> <button type="submit" class="col-12 btn btn-primary">Start chat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div>
        <form method="POST" action="{{route('promotion.update',$promotion)}}" class="bg-white">
            @csrf
            @method('put')
            <div class="form-group row">
                <label for="nom" class="col-md-4 col-form-label text-md-right">Nom de la promotion</label>
                <div class="col-md-6">
                    <input id="nom" type="text" class="form-control" value="{{$promotion->nom}}" name="nom">
                </div>
            </div>
            <div class="form-group row">
                <label for="gamme_id" class="col-md-4 col-form-label text-md-right">Réduction</label>
                <div class="col-md-6">
                    <input id="gamme_id" type="text" class="form-control " value="{{$promotion->reduction}}" name="reduction">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">date de début</label>
                <div class="col-md-6">
                    <input id="description" type="text" class="form-control " value="{{$promotion->date_debut}}" name="date_debut">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">date de fin</label>
                <div class="col-md-6">
                    <input id="description" type="text" class="form-control " value="{{$promotion->date_fin}}" name="date_fin">
                </div>
            </div>

            <div class="row">
                @foreach ($articles as $article)
                <div class="input-group mb-3 col-3">
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" type="checkbox" id="article{{$article->id}}" name="article{{$article->id}}" value="{{$article->id}}" aria-label="Checkbox for following text input" @foreach ($promotion->articles as $articleenpromo)
                        @if ($article->id == $articleenpromo->id)
                        checked
                        @endif
                        @endforeach>
                        <label for="article{{$article->id}}">{{$article->nom}}</label>
                    </div>
                </div>
                @endforeach
            </div>
            <input type="submit" value="Validez">
        </form>
    </div>
</body>
@endsection
@extends('layouts.app')

@section('content')

<body>
    <form method="POST" action="{{ route('articles.store') }}">
        @csrf
        <div class="form-group row">
            <label for="nom" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
                <input id="nom" type="text" class="form-control " name="nom" value="{{$article->nom}}" required autocomplete="nom" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="gamme_id" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
                <input id="gamme_id" type="text" class="form-control " name="gamme_id" value="{{$article->gamme_id}}" required autocomplete="gamme_id" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
                <input id="description" type="description" class="form-control " name="description" value="{{$article->description}}" required autocomplete="description">
            </div>
        </div>
        <div class="form-group row">
            <label for="description_detaillee" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
                <input id="description_detaillee" type="description_detaillee" class="form-control " name="description_detaillee" value="{{$article->description_detaillee}}" required autocomplete="description_detaillee">
            </div>
        </div>
        <div class="form-group row">
            <label for="prix" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
                <input id="prix" type="prix" class="form-control " name="prix" value="{{$article->prix}}" required autocomplete="prix">
            </div>
        </div>
        <div class="form-group row">
            <label for="stock" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
                <input id="stock" type="stock" class="form-control " name="stock" value="{{$article->stock}}" required autocomplete="stock">
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right"></label>
            <div class="col-md-6">
                <input id="image" type="image" class="form-control " name="image" value="{{$article->image}}" required autocomplete="image">
            </div>
            <h3>Joindre une image</h3>
            @if(Session::get('image'))
            <input type="text" class="form-control" name="image" id="image" value="{{Session::get('image')}}">
            @else
            <input type="text" name="image" id="image" class="form-control my-2" placeholder="Upload d'images ci-dessous">
            @endif
            <button class="btn-success">Envoyer</button>
        </div>
        </div>
    </form>
    <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 my-2">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-6 my-2">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>
        </div>
    </form>
    </div>
    </form>
</body>
@endsection
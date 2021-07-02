@extends('layouts.app')

@section('content')

<body>
<div>
        <form method="POST" action="" class="bg-white">
            @csrf
            <div class="form-group row">
                <label for="nom" class="col-md-4 col-form-label text-md-right">Nom de l'article</label>
                <div class="col-md-6">
                    <input id="nom" type="text" class="form-control " name="nom" required autocomplete="nom" autofocus placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="gamme_id" class="col-md-4 col-form-label text-md-right">gamme_id</label>
                <div class="col-md-6">
                    <input id="gamme_id" type="text" class="form-control " name="gamme_id" required autocomplete="gamme_id" autofocus placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">description</label>
                <div class="col-md-6">
                    <input id="description" type="description" class="form-control " name="description" required autocomplete="description" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="description_detaillee" class="col-md-4 col-form-label text-md-right">description_detaillee</label>
                <div class="col-md-6">
                    <input id="description_detaillee" type="description_detaillee" class="form-control " name="description_detaillee" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="prix" class="col-md-4 col-form-label text-md-right">prix</label>
                <div class="col-md-6">
                    <input id="prix" type="prix" class="form-control " name="prix" required autocomplete="prix" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="stock" class="col-md-4 col-form-label text-md-right">stock</label>
                <div class="col-md-6">
                    <input id="stock" type="stock" class="form-control " name="stock" required autocomplete="stock" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-md-4 col-form-label text-md-right"></label>
                <h2>Joindre une image</h2>
                @if(Session::get('image'))
                <input type="text" class="form-control" name="image" id="image" value="{{session::get('image')}}">
                @else
                <input type="text" name="image" id="image" class="form-control my-2" placeholder="Upload d'images ci-dessous">
                @endif
                <button class="btn-success">Envoyer</button>
            </div>

        </form>
        <div class="col">
            <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 my-2">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-4 my-2">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
@endsection
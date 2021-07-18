@extends('layouts.app')

@section('content')

<body> 
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="{{ route('articles.store') }}" class="bg-white">
                @csrf
                <div class="form-group row">
                    <label for="nom" class="col-md-4 col-form-label text-md-right">Nom de l'article</label>
                    <div class="col-md-6">
                        <input id="nom" type="text" class="form-control " name="nom" required autocomplete="nom" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gamme_id" class="col-md-4 col-form-label text-md-right">gamme_id</label>
                    <div class="col-md-6">
                        <input id="gamme_id" type="text" class="form-control " name="gamme_id" required autocomplete="gamme_id" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">description</label>
                    <div class="col-md-6">
                        <input id="description" type="description" class="form-control " name="description" required autocomplete="description">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description_detaillee" class="col-md-4 col-form-label text-md-right">description_detaillee</label>
                    <div class="col-md-6">
                        <input id="description_detaillee" type="description_detaillee" class="form-control " name="description_detaillee">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prix" class="col-md-4 col-form-label text-md-right">prix</label>
                    <div class="col-md-6">
                        <input id="prix" type="prix" class="form-control " name="prix" required autocomplete="prix">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stock" class="col-md-4 col-form-label text-md-right">stock</label>
                    <div class="col-md-6">
                        <input id="stock" type="stock" class="form-control " name="stock" required autocomplete="stock">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-4 col-form-label text-md-right"></label>
                    <h2>Joindre une image</h2>
                    @if(Session::get('image'))
                    <input type="text" class="form-control" name="image" id="image" value="{{Session::get('image')}}">
                    @else
                    <input type="text" name="image" id="image" class="form-control my-2" placeholder="Upload d'images ci-dessous">
                    @endif
                    <button class="btn-success">Envoyer</button>
                </div>
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
            </form>
        </div>
    </div>
    <!-------------------------------------------------------------LISTE ARTICLES---------------------------------------------------->
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Nom article</th>
                                    <th>id_article</th>
                                    <th>gamme_id</th>
                                    <th>prix</th>
                                    <th>Stock</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            @foreach ($articles as $article)
                            <tbody class="table-body">
                                <tr class="cell-1" data-toggle="collapse" data-target="#demo">
                                    <td class="text-center">{{ $article->nom}}</td>
                                    <td>{{ $article->id}}</td>
                                    <td>{{ $article->gamme_id}}</td>
                                    <td>{{ $article->prix}} Euros</td>
                                    <td>{{ $article->stock}}</td>
                                    <th>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <form action="{{route('articles.edit',$article)}}" method="get">
                                                @CSRF
                                                <input type="submit" value="Modifier l'article" name="modifarticle" class="btn btn-warning">
                                                <input type="hidden" value="modifier l'article" name="{{$article}}">
                                            </form>
                                            <form action="{{route('articles.destroy',$article)}}" method="post">
                                                @CSRF
                                                @method('delete')
                                                <input type="submit" value="Supprimer l'article" name="modifarticle" class="btn btn-danger">
                                                <input type="hidden" value="modifier l'article" name="{{$article}}">
                                            </form>
                                        </div>
                                    </th>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
@extends('layouts.app')
@section('content')

<body>
    <div class="row justify-content-center my-5">
        <div class="col-6">
            <form method="POST" action="{{route('gammes.store')}}" class="bg-white">
                @csrf
                @method('post')
                <div class="form-group row">
                    <label for="nom" class="col-md-4 col-form-label text-md-right ">Nom de la gamme</label>
                    <div class="col-md-6">
                        <input id="nom" type="text" class="form-control" name="nom">
                    </div>
                </div>
                <input type="submit" value="Ajouter la gamme" class="btn btn-success">
            </form>
        </div>
    </div>
    <div class="row">
        @foreach ($gammes as $gamme)
        <div class="col-md-6 my-5">
            <form action="{{route('gammes.update',$gamme)}}" method="post">
                @CSRF
                @method('put')
                <input type="text" name="nom" value="{{$gamme->nom}}" class="form-control">
                <input type="submit" value="Modifier la gamme" class="btn btn-warning">
            </form>
            <form action="{{route('gammes.destroy',$gamme)}}" method="post">
                @CSRF
                @method('delete')
                <input type="submit" value="Supprimer la gamme" name="deletegamme" class="btn btn-danger">
                <input type="hidden" value="Supprimer la gamme" name="{{$gamme->nom}}">
            </form>
        </div>
        @endforeach
    </div>
</body>
@endsection
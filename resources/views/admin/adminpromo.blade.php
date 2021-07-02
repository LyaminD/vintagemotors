@extends('layouts.app')
@section('content')
<body>
    <div>
        <form action="" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4 my-2">
                    <input type="text" name="gamme" class="form-control">
                </div>
                <div class="col-md-4 my-2">
                    <button type="submit" class="btn btn-success">Ajouter une gamme</button>
                </div>
            </div>
        </form>
    </div>
</body>
@endsection
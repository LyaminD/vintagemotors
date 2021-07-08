@extends('layouts.app')

@section('content')

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-10">
                <div class="rounded">
                    <div class="table-responsive table-borderless">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">id_client</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Pseudo</th>
                                    <th>Email</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            @foreach ($users as $user)
                            <tbody class="table-body">
                                <tr class="cell-1" data-toggle="collapse" data-target="#demo">
                                    <td class="text-center">{{$user->id}}</td>
                                    <td>{{$user->nom}}</td>
                                    <td>{{$user->prenom}}</td>
                                    <td>{{$user->pseudo}}</td>
                                    <td>{{$user->email}}</td>
                                    <th>
                                        <form action="{{route('user.destroy',$user)}}" method="post">
                                            @CSRF
                                            @method('delete')
                                            <input type="submit" value="Supprimer le client" class="btn btn-danger">
                                        </form>
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
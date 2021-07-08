@extends('layouts.app')
@section('content')

<body>
    @foreach ($promotions as $promotion)
    <tbody class="table-body">
        <tr class="cell-1" data-toggle="collapse" data-target="#demo">
            <td class="text-center">{{ $promotion->nom}}</td>
            <td>{{ $promotion->id}}</td>
            <td>{{ $promotion->reduction}} %</td>
            <td>{{ $promotion->date_debut}}</td>
            <td>{{ $promotion->date_fin}}</td>
            <th>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form action="{{route('promotion.edit',$promotion)}}" method="get">
                        @CSRF
                        <input type="submit" value="Modifier la promotion" name="modifpromo" class="btn btn-warning">
                        <input type="hidden" value="Modifier la promotion" name="{{$promotion}}">
                    </form>
                    <form action="{{route('promotion.destroy',$promotion)}}" method="post">
                        @CSRF
                        @method('delete')
                        <input type="submit" value="Supprimer la promotion" name="deletepromo" class="btn btn-danger">
                        <input type="hidden" value="Supprimer la promotion" name="{{$promotion}}">
                    </form>
                </div>
            </th>
        </tr>
    </tbody>
    @endforeach
</body>
@endsection
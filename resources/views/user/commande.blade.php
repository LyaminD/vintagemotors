@extends('layouts.app')

@section('content')

<h3>Récapitulatif des commandes antérieurs</h3>
@foreach ($user->commandes as $commande)
<div class="container">
    <!------------------------------- Affichage de la commande --------------------------------------------->
    <div class="table-responsive shadow mb-3">
        <table class="table table-bordered table-hover bg-white mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>Numéro de commande</th>
                    <th>Date de commande</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong><a href="{{ route('commande.show',$commande) }}" title="Afficher le produit">{{ $commande->numero}}</a></strong>
                    </td>
                    <td>{{ $commande->created_at}}</td>
                    <td>{{ $commande->prix}} Euros</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endforeach
@endsection
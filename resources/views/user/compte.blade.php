@extends('layouts.app')

@section('content')
<h3>Récapitulatif des commandes antérieurs</h3>
@foreach ($commandes as $commande)
<div class="container">
    <!------------------------------- Affichage de la commande --------------------------------------------->
    <h3>Ma commande</h3>
    <div class="table-responsive shadow mb-3">
        <table class="table table-bordered table-hover bg-white mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>Numéro de commande</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <strong><a href="{{ route('commande.show', $key) }}" title="Afficher le produit">{{ $item['nom'] }}</a></strong>
                    </td>
                    <td>{{ $item['prix'] }} Euros</td>
                    <td>
                        <!-- Le total du produit = prix * quantité -->
                        {{ $item['prix'] * $item['quantite'] }} Euros
                    </td>
                </tr>              
                <tr colspan="2">
                    <td colspan="4">Total de la commande</td>
                    <td colspan="2">
                        <strong>{{ $total + $totalfraisdeport }} Euros </strong>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
</div>
@endforeach
@endsection
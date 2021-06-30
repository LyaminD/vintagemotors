@extends("layouts.app")
@section("content")
<div class="container">

    <!------------------------------- Affichage de la commande --------------------------------------------->
    <h3>Détail de la commande</h3>
    <div class="table-responsive shadow mb-3">
        <table class="table table-bordered table-hover bg-white mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>Commande numéro <a href="{{ route('commande.show',$commande) }}" title="Afficher le produit">{{$commande->numero}}</a></strong>
                    </td>
                </tr>
                <tr colspan="2">
                    <td colspan="4">Produits</td>
                    <td colspan="2">
                        <!-- On affiche total frais de port -->
                        <strong> Euros</strong>
                    </td>
                </tr>
                <tr colspan="2">
                    <td colspan="4">Quantité d'articles</td>
                    <td colspan="2">
                        <!-- On affiche total général avec frais de ports-->
                        <strong>{{$commande->quantite}}  </strong>
                    </td>
                </tr>
                <tr colspan="2">
                    <td colspan="4">Total de la commande</td>
                    <td colspan="2">
                        <!-- On affiche total général avec frais de ports-->
                        <strong>{{$commande->prix}} Euros </strong>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
</div>
@endsection
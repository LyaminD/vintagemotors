@extends("layouts.app")
@section("content")
<div class="container">

    <!------------------------------- Affichage de la commande --------------------------------------------->
    <h3>Détail de la commande</h3>
    @foreach ($commande->articles as $article)
    <div class="table-responsive shadow mb-3">
        <table class="table table-bordered table-hover bg-white mb-0">
            <tbody>
                <tr>
                    <td>
                        <strong>Commande numéro <a href="{{ route('commande.show',$commande) }}" title="Afficher le produit">{{$commande->numero}}</a></strong>
                    </td>
                </tr>
                <tr colspan="4">
                    <td colspan="4">Produits</td>
                    <td colspan="2">
                        <strong> {{$article->nom}}</strong>
                    </td>
                </tr>
                <tr colspan="4">
                    <td colspan="4">Quantité d'articles</td>
                    <td colspan="2">
                        <strong>{{$article->pivot->quantite}}</strong>
                    </td>
                </tr>
                <tr colspan="4">
                    <td colspan="4">Prix de l'article</td>
                    <td colspan="2">
                        <strong>{{$article->prix}} Euros </strong>
                    </td>
                </tr>
                <tr colspan="4">
                    <td colspan="4">Prix des articles</td>
                    <td colspan="2">
                        <strong>{{$article->prix * $article->pivot->quantite}} Euros </strong>
                    </td>
                </tr>
                <tr colspan="4">
                    <td colspan="4">frais de port unitaire</td>
                    <td colspan="2">
                        <strong>100 Euros </strong>
                    </td>
                </tr>
                <tr colspan="4">
                    <td colspan="4">frais de port total de l'article</td>
                    <td colspan="2">
                        <strong>{{100 * $article->pivot->quantite}} Euros </strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    @endforeach
    <table class="table table-bordered table-hover bg-white mb-0">
        <tr>
            <td>
                <strong>Frais de port total de la commande {{$commande->prix - ($article->prix * $article->pivot->quantite)}} Euros </strong>
            </td>
            <td>
                <strong>Total de la commande {{$commande->prix}} Euros </strong>
            </td>
        </tr>
    </table>
</div>
@endsection
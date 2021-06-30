@extends("layouts.app")
@section("content")
<div class="container">

    @if (session()->has('message'))
    <div class="alert alert-info">{{ session('message') }}</div>
    @endif
    <!------------------------------- Affichage et modification du panier --------------------------------------------->
    @if (session()->has("panier"))
    <h3>Mon panier</h3>
    <div class="table-responsive shadow mb-3">
        <table class="table table-bordered table-hover bg-white mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Opérations</th>
                </tr>
            </thead>
            <tbody>
                <!-- Initialisation du total général à 0 -->
                @php
                $total = 0;
                $totalfraisdeport = 0;
                @endphp

                <!-- On parcourt les produits du panier en session : session('panier') -->
                @foreach (session("panier") as $key => $item)

                <!-- On incrémente le total général par le total de chaque produit du panier -->
                @php $total += $item['prix'] * $item['quantite'] @endphp
                <!-- On incrémente la quantité par le montant des frais de port pour chaque produits du panier -->
                @php $totalfraisdeport += 100 * $item['quantite'] @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <strong><a href="{{ route('articles.show', $key) }}" title="Afficher le produit">{{ $item['nom'] }}</a></strong>
                    </td>
                    <td>{{ $item['prix'] }} Euros</td>
                    <td>
                        <!-- Le formulaire de mise à jour de la quantité -->
                        <form method="POST" action="{{ route('panier.add', $key) }}" class="form-inline d-inline-block">
                            {{ csrf_field() }}
                            <input type="number" name="quantite" placeholder="Quantité" value="{{ $item['quantite'] }}" class="form-control mr-2" style="width: 80px">
                            <input type="submit" class="btn btn-primary" value="Actualiser" />
                        </form>
                    </td>
                    <td>
                        <!-- Le total du produit = prix * quantité -->
                        {{ $item['prix'] * $item['quantite'] }} Euros
                    </td>
                    <td>
                        <!-- Le Lien pour retirer un produit du panier -->
                        <a href="{{ route('panier.remove', $key) }}" class="btn btn-outline-danger" title="Retirer le produit du panier">Retirer</a>
                    </td>
                </tr>
                @endforeach
                <tr colspan="2">
                    <td colspan="4">Total général</td>
                    <td colspan="2">
                        <!-- On affiche total général -->
                        <strong>{{ $total }} Euros</strong>
                    </td>
                </tr>
                <tr colspan="2">
                    <td colspan="4">Frais de port = 100 euros / motos</td>
                    <td colspan="2">
                        <!-- On affiche total frais de port -->
                        <strong>{{ $totalfraisdeport }} Euros</strong>
                    </td>
                </tr>
                <tr colspan="2">
                    <td colspan="4">Total général avec frais de ports</td>
                    <td colspan="2">
                        <!-- On affiche total général avec frais de ports-->
                        <strong>{{ $total + $totalfraisdeport }} Euros </strong>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>

    <!-- Lien pour vider le panier -->
    <a class="btn btn-danger" href="{{ route('panier.empty') }}" title="Retirer tous les produits du panier">Vider le panier</a>

    @else
    <div class="alert alert-info">Aucun produit au panier</div>
    @endif
</div>
<!------------------------------- Choix adresse de livraison --------------------------------------------->
<h3>Choisissez votre adresse de livraison</h3>

<div class="row my-5">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Adresse 1</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Validez cette adresse
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Adresse 2</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Validez cette adresse
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------- Choix mode de livraison --------------------------------------------->
<h3>Choisissez votre mode de livraison</h3>

<div class="row my-5">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mode de livraison en agence</h5>
                <p class="card-text">Livraison en agence partout ou vous voulez en France.</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Validez le mode de livraison
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mode de livraison au domicile</h5>
                <p class="card-text">Livraison a votre domicile.</p>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Validez le mode de livraison
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------- Règlement + validation commande --------------------------------------------->
<div class="container">
    <div class="page-header text-center">
        <h1>Réglement de la commande</h1>
    </div>
    <!-- Credit Card Payment Form - START -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <h3 class="text-center">Détails paiement</h3>
                            <div class="inlineimage"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Mastercard-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Discover-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Paypal-Curved.png"> <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/American-Express-Curved.png"> </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group"> <label>Numéro de carte</label>
                                        <div class="input-group"> <input type="tel" class="form-control" placeholder="Valid Card Number" /> <span class="input-group-addon"><span class="fa fa-credit-card"></span></span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group"> <label><span class="hidden-xs">date d'éxpiration</span><span class="visible-xs-inline">EXP</span> DATE</label> <input type="tel" class="form-control" placeholder="MM / YY" /> </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group"> <label>CV CODE</label> <input type="tel" class="form-control" placeholder="CVC" /> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group"> <label>Titulaire de la carte</label> <input type="text" class="form-control" placeholder="Card Owner Name" /> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-12"> <button class="btn btn-success btn-lg btn-block">Confirmer le paiement et la commande</button> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
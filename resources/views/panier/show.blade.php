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
                $total = 0 ;
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
<div class="col d-flex justify-content-center">
    <div class="payment-info">
        <div class="d-flex justify-content-between align-items-center"><span>Carte de crédit</span></div><span class="type d-block mt-3 mb-1">Card type</span><label class="radio"> <input type="radio" name="card" value="payment" checked> <span><img width="30" src="https://img.icons8.com/color/48/000000/mastercard.png" /></span> </label>
        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/visa.png" /></span> </label>
        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/ultraviolet/48/000000/amex.png" /></span> </label>
        <label class="radio"> <input type="radio" name="card" value="payment"> <span><img width="30" src="https://img.icons8.com/officel/48/000000/paypal.png" /></span> </label>
        <div><label class="credit-card-label">Nom du titulaire</label><input type="text" class="form-control credit-inputs" placeholder="Nom / Prénom"></div>
        <div><label class="credit-card-label">Numéro de carte</label><input type="text" class="form-control credit-inputs" placeholder="0000 0000 0000 0000"></div>
        <div class="row">
            <div class="col-md-6"><label class="credit-card-label">Date</label><input type="text" class="form-control credit-inputs" placeholder="12/24"></div>
            <div class="col-md-6"><label class="credit-card-label">CVV</label><input type="text" class="form-control credit-inputs" placeholder="000"></div>
        </div>
        <hr class="line">
        <div class="d-flex justify-content-between information"><span>Total</span><span>{{ $total }} Euros</span></div>
        <div class="d-flex justify-content-between information"><span>Frais de port</span><span>{{ $totalfraisdeport }} Euros</span></div>
        <div class="d-flex justify-content-between information"><span>Total(Incl. taxes)</span><span>{{ $total + $totalfraisdeport }} Euros</span></div>
        <button class="btn btn-success btn-block d-flex justify-content-between mt-3" type="button"><span>{{ $total + $totalfraisdeport }} Euros</span><span>Validez votre commande !<i class="fa fa-long-arrow-right ml-1"></i></span></button>
    </div>
</div>
@endsection
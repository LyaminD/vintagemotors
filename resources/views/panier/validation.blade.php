@extends('layouts.app')
@section('content')

<div class="container bg-white">
    <div class="">
        <div class="">
            <div class="">
                <h5 class="" id="">Commande validée !</h5>
            </div>
            <div class="">
                <p>Félicitation votre commande a été validée !</p>
                <p>Expédition de la commande prévue le <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                                                        $date = date("Y-m-d");
                                                        echo strftime("%A %d %B %Y", strtotime($date . " + 3 days")); ?> !</p>
                <p>Votre date de livraison est prévue le <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                                                            $date = date("Y-m-d");
                                                            echo strftime("%A %d %B %Y", strtotime($date . " + 25 days")); ?> !</p>
                <p>Merci pour votre achat et à bientôt !</p>
            </div>
            <div class="">
                <a href="{{route('panier.empty')}}" class="btn btn-primary">Retour sur mon compte</a>
            </div>
        </div>
    </div>
</div>
@endsection
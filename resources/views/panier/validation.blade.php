@extends('layouts.app')
@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Commande validée !</h5>
            </div>
            <div class="modal-body">
                <p>Félicitation votre commande a été validée !</p>
                <p>Expédition de la commande prévue le <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                                                        $date = date("Y-m-d");
                                                        echo strftime("%A %d %B %Y", strtotime($date . " + 3 days")); ?> !</p>
                <p>Votre date de livraison est prévue le <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                                                            $date = date("Y-m-d");
                                                            echo strftime("%A %d %B %Y", strtotime($date . " + 25 days")); ?> !</p>
                <p>Merci pour votre achat et à bientôt !</p>
            </div>
            <div class="modal-footer">
                <form action="compte.php" method="post" class="mb-2 mt-2">
                    <input type="hidden" name="orderValidated">
                    <input type="submit" value="Retour sur mon compte" class="btn btn-secondary">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
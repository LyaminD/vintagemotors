@extends('layouts.app')

@section('content')

<body>
    <h3>Notre histoire</h3>
    <div class="row align-items-center">
        <div class="col-md-6 text-center text-white">
            <p>Vintagemotors, société créer en 2001, à Soudan dans les Deux-Sèvres.</p>
            <p>Passioné de motos depuis mon plus jeune âge, ou je bricolait déjà vélos et mobylettes.</p>
            <p>Aujourd'hui nous sommes 5 dans l'équipe</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15558.493740300164!2d-0.11737176385958445!3d46.42136492086863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48075b984ce8aa2d%3A0x3046f55be940b90f!2s79800%20Soudan!5e0!3m2!1sfr!2sfr!4v1626421728426!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="tribunal text-center my-3 col-md-6">
            <img src="{{ asset("images/lol.jpg") }}" class="img-thumbnail">
        </div>


    </div>
    <h3>Qualité de fabrication</h3>
    <div class="row">
        <div class="col text-center text-white">
            <p>Toutes nos motos sont façonnées dans notre atelier à la main, selon un cahier des charges bien particulier, et réspectant les règles environementales !</p>
            <p>Vous avez besoin de quelquechose d'unique ? Nous le réalisons !</p>
            <p>Votre moto ne ressemblera a aucune autre !</p>
        </div>
    </div>



    <div class="container">
    <form id="contactus" action="" method="post">
        <h3>Contactez-nous !</h3>
        <fieldset> <input placeholder="Nom" type="text" tabindex="1" required autofocus> </fieldset>
        <fieldset> <input placeholder="Adresse mail" type="email" tabindex="2" required> </fieldset>
        <fieldset> <input placeholder="Numero de téléphone" type="tel" tabindex="3" required> </fieldset>
        <fieldset> <textarea placeholder="Entrez votre méssage . . ." tabindex="5" required></textarea> </fieldset>
        <fieldset> <button name="submit" type="submit" id="contactus-submit" data-submit="...Sending">Envoyer</button> </fieldset>
    </form>
</div>



</body>
@endsection
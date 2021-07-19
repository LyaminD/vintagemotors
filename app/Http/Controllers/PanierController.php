<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use App\Models\User;
use Illuminate\Http\Request;

use App\Repositories\PanierInterfaceRepository;

use App\Models\Article;

class PanierController extends Controller
{

    protected $panierRepository; // L'instance PanierSessionRepository

    public function __construct(PanierInterfaceRepository $panierRepository)
    {
        $this->panierRepository = $panierRepository;
        $this->middleware('auth');
    }

    # Affichage du panier
    public function show(Request $request)
    {   
        if (($request->input('modelivraison')!= null)){                 
        $modelivraison = $request->input('modelivraison');
        session(['modelivraison'=>$modelivraison]);
          }
         if (($request->input('adresseid')!= null)){               
        $adresseid = $request->input('adresseid');
        $adresselivraison = Adresse::find($adresseid);
        session(['adresselivraison'=>$adresselivraison]);
          }
        $id =  auth()->user()->id;
        $adresses  = Adresse::where('user_id', $id)->get();
        $user = auth()->user();
        return view('panier.show', compact('adresses','user'));
        
    }

    # Ajout d'un produit au panier
    public function add(Article $article, Request $request)
    {
        // Validation de la requête
        $this->validate($request, [
            "quantite" => "numeric|min:1"
        ]);

        // Ajout/Mise à jour du produit au panier avec sa quantité
        $this->panierRepository->add($article, $request->quantite);

        // Redirection vers le panier avec un message
        return redirect()->route("panier.show")->withMessage("Produit ajouté au panier");
    }

    // Suppression d'un produit du panier
    public function remove(Article $article)
    {
        // Suppression du produit du panier par son identifiant
        $this->panierRepository->remove($article);

        // Redirection vers le panier
        return back()->withMessage("Produit retiré du panier");
    }

    // Vider la panier
    public function empty()
    {
        // Suppression des informations du panier en session
        $this->panierRepository->empty();

        // Redirection vers le panier
        return redirect()->route('compte');
    }
}

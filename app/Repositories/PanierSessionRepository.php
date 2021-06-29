<?php

namespace App\Repositories;

use App\Models\Article;

class PanierSessionRepository implements PanierInterfaceRepository  {

	# Afficher le panier
	public function show () {
		return view("panier.show"); // resources\views\basket\show.blade.php
	}

	# Ajouter/Mettre à jour un produit du panier
	public function add (Article $product, $quantite) {		
		$panier = session()->get("panier"); // On récupère le panier en session

		// Les informations du produit à ajouter
		$product_details = [
			'nom' => $product->nom,
			'prix' => $product->prix,
			'quantite' => $quantite
		];
		
		$panier[$product->id] = $product_details; // On ajoute ou on met à jour le produit au panier
		session()->put("panier", $panier); // On enregistre le panier
	}

	# Retirer un produit du panier
	public function remove (Article $product) {
		$panier = session()->get("panier"); // On récupère le panier en session
		unset($panier[$product->id]); // On supprime le produit du tableau $basket
		session()->put("panier", $panier); // On enregistre le panier
	}

	# Vider le panier
	public function empty () {
		session()->forget("panier"); // On supprime le panier en session
	}

}

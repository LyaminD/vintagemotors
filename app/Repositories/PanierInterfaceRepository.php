<?php

namespace App\Repositories;

use App\Models\Article;

interface PanierInterfaceRepository {

	// Afficher le panier
	public function show();

	// Ajouter un produit au panier
	public function add(Article $article, $quantity);

	// Retirer un produit du panier
	public function remove(Article $article);

	// Vider le panier
	public function empty();
}

<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Article;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user->load('commandes');
        return view('user.commande', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $commande = new Commande;
        $commande->user_id = $user_id;
        $commande->numero = rand(1000000, 9999999);
        $commande->prix = $request->input('prix');
        $commande->save();

        foreach (session('panier') as $article) {
            $commande->articles()->attach(
                $article['id'],
                ['quantite' => $article['quantite']]
            );

            $articleInDatabase = Article::find($article['id']);
            $articleInDatabase->stock -= $article['quantite'];
            $articleInDatabase->save();
        }

        return view('panier.validation')->with('message', 'Commande validée et payée avec succès');
    }

    public function validation()
    {
        return view('panier.validation');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        $commande->load('articles');
        return view('user.detailcommande',compact('commande'));    
    }

}

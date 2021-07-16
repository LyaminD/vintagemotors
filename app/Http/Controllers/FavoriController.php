<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;

class FavoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = User::find(auth()->user()->id);
        $user->load('favoris');  
        return view('user.mesfavoris',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {   
       
            $user= User::find(auth()->user()->id) ;
            $user->favoris()->attach($request->input('article_id'));

           return redirect()->back()->with('message','Article ajouter aux favoris !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Article $article)
    {
        $user= User::find(auth()->user()->id) ;
        $user->favoris()->detach($request->input('article_id'));

       return redirect()->back()->with('message','Article retirer des favoris !');
    }
}

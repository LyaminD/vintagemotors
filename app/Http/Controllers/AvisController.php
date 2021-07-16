<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;
use App\Models\Article;

class AvisController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'avis' => 'min:10|max:255',
            'note' => 'required|min:1|max:5',
        ]);
        $articleId = $request->input('article_id');
        $newNote = intval($request->input('note'));
        $article = Article::find($articleId);

        $moyenneActuelle = $article->note;
        $touslesAvis = Avis::where('article_id', $articleId)->get();
        $nombreNote = count($touslesAvis)+1;
        $nouvelleMoyenne = ($nombreNote * $moyenneActuelle + $newNote) / ($nombreNote + 1);

        $article->note = $nouvelleMoyenne;
        $article->save();

        Avis::create($request->all());

        return back()->with('message', 'Avis poster avec succès');
    }
}

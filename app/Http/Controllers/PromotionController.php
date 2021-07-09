<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()) {
            $userId = auth()->user()->id;
            $favorisIds = DB::table('favoris')->where('user_id', '=', $userId)->pluck('article_id');
            $favorisIds = $favorisIds->toArray();
        } else {
            $favorisIds = null;
        }
        $promotions = Promotion::with('articles')->get();
        return view('articles.promotions', compact('promotions','favorisIds'));
    }
    public function promotion()
    {
        $promotions = Promotion::all();
        return view('admin.adminpromo', compact('promotions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        $promotion->load('articles');
        $articles = Article::all();

        return view('admin.modifpromo', compact('promotion', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:100'],
            'reduction' => ['required', 'string', 'max:10'],
            'date_debut' => ['required', 'string', 'max:20'],
            'date_fin' => ['required', 'string', 'max:20'],
        ]);

        $promotion->update($request->all());

        foreach ($promotion->articles as $article) {
            $promotion->articles()->detach($article);
        }

        $articles = Article::all();
        for ($i = 0; $i < count($articles); $i++) {
            if (isset($request['article' . $i])) {
                $promotion->articles()->attach([$request['article' . $i]]);
            }
        };
        return redirect()->route('adminpromo')->with('message', 'Promotion modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($promotion)
    {
        $promotion->delete();
        return redirect()->route('adminpromo')->with('message', 'Promotion supprimée avec succès');
    }
}

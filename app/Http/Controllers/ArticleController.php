<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $articles=Article::all();
       return view('articles.articles',compact('articles'));
    }

    public function article()
    {
       $articles=Article::all();
       return view('admin.adminarticle',compact('articles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [
            'nom' => ['required', 'string', 'max:100'],
            'gamme_id' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:100'],
            'description_detaillee' => ['required', 'string', 'max:500'],
            'image' => ['required', 'string', 'max:255'],
            'prix' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'string', 'max:255'],
            
            ]);

  //      $article = new Article;
   //         $article->nom = $request->input('nom');
   //         $article->gamme_id = $request->input('gamme_id');
    //        $article->description = $request->input('description');
    //        $article->description_detaillee = $request->input('description_detaillee');
    //        $article->image = $request->input('image');
    //        $article->prix = $request->input('prix');
    //        $article->stock = $request->input('stock');
     //       $article->save(); 
            Article::create($request->all());

           return redirect()->route('admin')->with('message','Article ajouter en BDD');
    }

    public function classement()
    {
        $classement=Article::all()->sortByDesc('note');
        return view('articles.classement',compact('classement'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.detail',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($article)
    {
        return view('admin.modifarticle', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate( [
            'nom' => ['required', 'string', 'max:100'],
            'gamme_id' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:100'],
            'description_detaillee' => ['required', 'string', 'max:500'],
            'image' => ['required', 'string', 'max:255'],
            'prix' => ['required', 'string', 'max:255'],
            'stock' => ['required', 'string', 'max:255'],
            
            ]);

            Article::update($request->all());

            return redirect()->route('admin')->with('message','Article modifier avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

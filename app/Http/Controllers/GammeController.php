<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gamme;
use Illuminate\Support\Facades\DB;

class GammeController extends Controller
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
        $gammes=Gamme::with('articles')->get();
        return view('articles.gammes',compact('gammes','favorisIds'));
    }
    public function gamme()
    {
       $gammes=Gamme::all();
       return view('admin.admingammes',compact('gammes'));
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
            'nom' => ['required', 'string', 'max:20'],
            ]);

            Gamme::create($request->all());
           return redirect()->route('admingammes')->with('message','Gamme ajouter en BDD');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gamme $gamme)
    {
        $request->validate( [
            'nom' => ['required', 'string', 'max:100'],
            ]);
            $gamme->update($request->all());
            return redirect()->view('admingammes', compact('gamme'))->with('message','Gamme modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gamme $gamme)
    {
        $gamme->delete();
        return redirect()->route('admingammes')->with('message','Gamme supprimée avec succès');
    }
}

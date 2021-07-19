<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Support\Facades\DB;
use App\Models\Article;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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

        $now = date('Y-m-d');
        $promoActuel=Promotion::with(['articles' => function ($query) {
            $query->take(3);
        }])
        ->whereDate('date_debut','<=', $now)
        ->whereDate('date_fin','>=', $now)
        ->get();

        $promoActuel = $promoActuel[0];
        $classement = Article::all()->sortByDesc('note')->take(3);
        
        return view('welcome',compact('promoActuel', 'favorisIds', 'classement'));
    }
}
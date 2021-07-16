<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        return view('welcome',compact('promoActuel', 'favorisIds'));
    }
}

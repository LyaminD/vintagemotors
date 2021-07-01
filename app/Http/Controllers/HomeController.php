<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Note;

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
        $now = date('Y-m-d');
        $promoActuel=Promotion::with(['articles' => function ($query) {
            $query->take(3);
        }])
        ->whereDate('date_debut','<=', $now)
        ->whereDate('date_fin','>=', $now)
        ->get();
        $promoActuel = $promoActuel[0];
        return view('welcome',compact('promoActuel'));


    }

    

}

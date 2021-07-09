<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adresse;
use App\Models\User;

class AdresseController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $request->validate( [
            'adresse' => ['required', 'string', 'max:80'],
            'ville' => ['required', 'string', 'max:50'],
            'code_postal' => ['required', 'string', 'max:5'],
            ]);

            Adresse::create($request->all());

           return redirect()->route('compte')->with('message','Adresse ajoutée');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Adresse $adresse)
    {
        $id =  auth()->user()->id;
        $adresses  = Adresse::where('user_id', $id)->get();
        return view('user.adresse', compact('adresses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $request->validate( [
            'adresse' => ['required', 'string', 'max:80'],
            'ville' => ['required', 'string', 'max:50'],
            'code_postal' => ['required', 'string', 'max:5'],
            ]);
            $adresse_id = intval($request->input('adresse_id'));
            $adresse = Adresse::find($adresse_id);
            $adresse->update($request->all());

        return redirect()->route('compte')->with('message', 'Adresse modifiées !');
    }

}

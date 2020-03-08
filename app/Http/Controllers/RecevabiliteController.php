<?php

namespace App\Http\Controllers;

use App\Recevabilite;
use App\Enregistrement;
use Illuminate\Http\Request;

class RecevabiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receve = Enregistrement::join('produits', 'produits.enreg_id', '=', 'enregistrements.id')
            ->join('recevabilites', 'recevabilites.enreg_id', '=', 'enregistrements.id')
            ->where('recevabilites.user_id', Auth()->user()->id )->get();
        // dd($receve);
        return view('recevabilite.index', ['receve' => $receve]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recevabilite.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produit= Recevabilite::create([
            'user_id' => $request->input('user_id'),
            'enreg_id' => $request->input('enreg_id'),
            'deadline' => $request->input('deadline'),
            'commentaire' => $request->input('commentaire')
        ]);
        return back()->with('success','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recevabilite  $recevabilite
     * @return \Illuminate\Http\Response
     */
    public function show(Recevabilite $recevabilite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recevabilite  $recevabilite
     * @return \Illuminate\Http\Response
     */
    public function edit(Recevabilite $recevabilite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recevabilite  $recevabilite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recevabilite $recevabilite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recevabilite  $recevabilite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recevabilite $recevabilite)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Variation;
use App\Laboratoire;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $var = Variation::where('user_id', Auth()->user()->id)->get();
        return view('variation.index', ['var' => $var]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labo = Laboratoire::where('user_id', Auth()->user()->id)->get();
        return view('variation.create', ['labo' => $labo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dossierName = Str::random(25);
        $paidName = Str::random(25);

        $dossier = $request->file('dossier');
        $paiement = $request->file('paiement');

        $extensionDoc = $dossier->extension();
        $extensionPay = $paiement->extension();

        $destinationPath = storage_path('/app/public/uploads/variations/'.Auth()->user()->id);
        $doc = 'variation-'.$request->input('amm').'-'.$dossierName.'.'.$extensionDoc;
        $pay = 'paiement-'.$request->input('amm').'-'.$paidName.'.'.$extensionPay;
        $dossier->move($destinationPath, $doc);
        $paiement->move($destinationPath, $pay);
        $labo= Variation::create([
            'dossier' => $doc,
            'paiement' => $pay,
            'user_id' => Auth()->user()->id,
            'amm' => $request->input('amm'),
            'laboratoire' => $request->input('laboratoire'),
            'produit' => $request->input('produit')
        ]);

        return back()->with('status','Votre demande de variation a été bien enregistrer..!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function show(Variation $variation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function edit(Variation $variation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Variation $variation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Variation  $variation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Variation $variation)
    {
        //
    }
}

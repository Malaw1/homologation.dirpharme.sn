<?php

namespace App\Http\Controllers;

use App\Visiteur;
use App\VEdu;
use App\VExp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use QrCode;

class VisiteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visiteur = Visiteur::where('agence_id', Auth()->user()->id )->get();
        // dd($visiteur);
        return view('visiteurs.index' , ['visiteur' => $visiteur]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visiteurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = Str::random(25);
        $photo = $request->file('photo');
        $extension = $photo->extension();
        $destinationPath = storage_path('/app/public/uploads/visiteurs/'.Auth()->user()->name);
        $filename = $request->input('prenom').'-'.$request->input('nom').'-'.$file.'.'.$extension;
        $photo->move($destinationPath, $filename);

        $visiteur= Visiteur::create([
        'prenom' => $request->input('prenom'),
        'email' => $request->input('email'),
        'telephone' => $request->input('telephone'),
        'agence_id' => Auth()->user()->id,
        'adresse' => $request->input('adresse'),
        'nom' => $request->input('nom'),
        'date_naiss' => $request->input('date_naiss'),
        'photo' => $filename,
        'lieu_naiss' => $request->input('lieu_naiss')
        ]);

        $etab = $request->input('etablissement');
        $diplome = $request->input('diplome');
        $annee = $request->input('annee');
        for($i = 0; $i < count($diplome) ; $i++){
            $edu =  VEdu::create([
            'etablissement' => $structure[$i],
            'diplome' => $diplome[$i],
            'annee' => $annee[$i],
            'v_id' => $visiteur->id
            ]);
        }

       $code = QrCode::size(700)
        ->format('png')
        ->generate('https://www.dirpharme.sn/visiteurs/'.$visiteur->id, public_path('qrcodes/'.$filename.'.png'));

        dd($visiteur, $edu, $code);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visiteur  $visiteur
     * @return \Illuminate\Http\Response
     */
    public function show(Visiteur $visiteur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visiteur  $visiteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Visiteur $visiteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visiteur  $visiteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visiteur $visiteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visiteur  $visiteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visiteur $visiteur)
    {
        //
    }
}

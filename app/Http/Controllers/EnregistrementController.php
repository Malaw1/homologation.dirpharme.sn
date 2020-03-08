<?php

namespace App\Http\Controllers;

use App\Enregistrement;
use App\Produit;
use App\Substance;
use App\Motivation;
use App\Laboratoire;
use App\User;
use App\Dossier;
use App\Forme;
use App\Classe;
use Illuminate\Http\Request;

class EnregistrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->role == 'labo' || Auth()->user()->role == 'agence' ){
            $enr = Produit::join('enregistrements', 'produits.enreg_id', '=', 'enregistrements.id')
            ->where('user_id', Auth()->user()->id )->get();

            // dd($enr);
            return view('enregistrement.index', ['enr' => $enr]);

        }
        else{
            $enr = Produit::join('enregistrements', 'produits.enreg_id', '=', 'enregistrements.id')
            ->get();

            // dd($enr);
            return view('enregistrement.index', ['enr' => $enr]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labo = Laboratoire::where('user_id', Auth()->user()->id)->get();
        $forme = Forme::All();
        $classe = Classe::All();
        // dd($forme);
        return view('enregistrement.create', ['labo' => $labo, 'forme' => $forme, 'classe' => $classe]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $numero = 1234;
        $a = date('d');
        $b = date('m');
        $c = date('y');
        $enr = Enregistrement::All()->last();

        $id = $enr->id+1;

        if($enr == Null){
            $numero= '0001'.$a.''.$b.''.$c;
        }elseif($enr->id < 10){
            $numero= '000'.$id.''.$a.''.$b.''.$c;
        }elseif($enr->id < 99){
            $numero= '00'.$id.''.$a.''.$b.''.$c;
        }elseif($enr->id < 999){
            $numero= '00'.$id.''.$a.''.$b.''.$c;
        }else{
            $numero= $id.''.$a.''.$b.''.$c;
        }

        $enreg= Enregistrement::create([
            'numero' => $numero,
            'type' => $request->input('type'),
            'user_id' => Auth()->user()->id,
            'status' => 'Demande soumise',
            'laboratoire' => $request->input('laboratoire')
        ]);


        $produit= Produit::create([
            'nom_medicament' => $request->input('nom_medicament'),
            'forme_pharmaceutique' => $request->input('forme_pharmaceutique'),
            'dci' => $request->input('dci'),
            'phone' => $request->input('phone'),
            'adresse' => $request->input('adresse'),
            'presentation' => $request->input('presentation'),
            'indication' => $request->input('indication'),
            'classe_therapeutique' => $request->input('classe_therapeutique'),
            'enreg_id' => $enreg->id,
            'pght' => $request->input('pght'),
            'email' => $request->input('email'),
            'manufacturer' => $request->input('manufacturer'),
            'excipient'     => $request->input('excipient'),
            'excipient_notoire' => $request->input('excipient_notoire')
        ]);

            $produit_id = $produit->id; /** Pour la table des substances */
            $dosage = $request->input('dosage');
            $substance = $request->input('substance');
            $unite = $request->input('unite');
            for($i = 0; $i < count($dosage) ; $i++){
                $subs =  Substance::create([
                'substance' => $substance[$i],
                'dosage' => $dosage[$i],
                'unite' => $unite[$i],
                'enreg_id' => $enreg->id
                ]);
            }

            $motivation= Motivation::create([
                'motivation' => $request->input('motivation'),
                'enreg_id' => $enreg->id,
            ]);

        // dd($enreg, $produit, $subs, $motivation);

        return back()->with('status', 'Votre demande est bien enregistrée sous le numero: '. $numero);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enregistrement  $enregistrement
     * @return \Illuminate\Http\Response
     */
    public function show(Enregistrement $enregistrement)
    {
        $enreg = User::join('enregistrements', 'enregistrements.user_id', '=', 'users.id')
            ->where('enregistrements.id', $enregistrement->id)
            ->first();

        $prod = Produit::where('enreg_id', $enregistrement->id)->first();

        $subs = Substance::where('enreg_id', $enregistrement->id)->get();

        $motivation = Motivation::where('enreg_id', $enregistrement->id)->first();

        $user = User::where('role', 'pharmacien')->get();

        $dossier = Dossier::where('enreg_id', $enregistrement->id)->get();

        // dd($enreg, $prod, $subs);


        return view('enregistrement.show',[
            'enreg' => $enreg,
            'prod' => $prod,
            'subs' => $subs,
            'motivation' => $motivation,
            'user' => $user,
            'dossier' => $dossier
        ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enregistrement  $enregistrement
     * @return \Illuminate\Http\Response
     */
    public function edit(Enregistrement $enregistrement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enregistrement  $enregistrement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enregistrement $enregistrement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enregistrement  $enregistrement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enregistrement $enregistrement)
    {
        //
    }
}

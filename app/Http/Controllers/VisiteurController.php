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
        $file = Str::random(20);
        $photo = $request->file('photo');
        $cv = $request->file('cv');

        $extension_1 = $photo->extension();
        $extension_2 = $cv->extension();

        $visiteur = $request->input('prenom').'-'.$request->input('nom').'-'.$file;
        $filename_1 = $visiteur.'.'.$extension_1;
        $filename_2 = $visiteur.'.'.$extension_2;

        $destinationPath = storage_path('/app/public/uploads/visiteurs/'.$visiteur);
        $photo->move($destinationPath, $filename_1);
        $cv->move($destinationPath, $filename_2);

        $numero = Str::random(15);
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . $characters[rand(0, strlen($characters) - 1)];
        // shuffle the result
        $numero = str_shuffle($pin);


        $visiteur= Visiteur::create([
        'numero' => $numero,
        'prenom' => $request->input('prenom'),
        'email' => $request->input('email'),
        'telephone' => $request->input('telephone'),
        'agence_id' => Auth()->user()->id,
        'adresse' => $request->input('adresse'),
        'nom' => $request->input('nom'),
        'date_naiss' => $request->input('date_naiss'),
        'photo' => $filename_1,
        'cv' => $filename_2,
        'lieu_naiss' => $request->input('lieu_naiss')
        ]);

        $image = QrCode::format('png')
        ->size(500)->errorCorrection('H')
        ->generate('https://www.dirpharme.sn/visiteurs/api/'.$visiteur->id, public_path('qrcodes/'.$file.'.png'));
        
        return back()->with('status', 'Enregistrement Reussi...!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Visiteur  $visiteur
     * @return \Illuminate\Http\Response
     */
    public function show(Visiteur $visiteur)
    {
        // dd($visiteur);

        $visit = Visiteur::join('users', 'users.id', '=', 'visiteurs.agence_id')
        ->where('visiteurs.id', $visiteur->id)
        ->first();

        // dd($visit);

        return response()->json([
            'prenom' => $visiteur->prenom,
            'nom' => $visiteur->nom,
            'Agence de Promotion' => $visit->name
        ]);

        
    }

    public function visiteur(Visiteur $visiteur){

        return view();
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

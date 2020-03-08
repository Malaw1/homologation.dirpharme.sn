<?php

namespace App\Http\Controllers;

use App\Renouvellement;
use App\Laboratoire;
use Illuminate\Http\Request;

class RenouvellementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->role == 'agence'){
        $ren = Renouvellement::join('laboratoires', 'laboratoires.id', '=', 'renouvellements.labo_titulaire')
            ->where('renouvellements.user_id', Auth()->user()->id)->get();
            return view('renouvellement.index', ['ren' => $ren]);
        }
        elseif(Auth()->user()->role == 'labo'){
            $ren = Renouvellement::join('users', 'users.id', '=', 'renouvellements.user_id')
            ->where('renouvellements.user_id', Auth()->user()->id)->get();
            return view('renouvellement.index', ['ren' => $ren]);
        }else{
            $ren = Renouvellement::join('users', 'users.id', '=', 'renouvellements.user_id')
            ->get();
            return view('renouvellement.index', ['ren' => $ren]);
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
        return view('renouvellement.create', ['labo' => $labo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $renouvellement= Renouvellement::create([
            'user_id' => Auth()->user()->id,
            'produit' => $request->input('produit'),
            'numero_amm' => $request->input('numero_amm'),
            'labo_titulaire' => $request->input('labo_titulaire'),
            'module_1' => $request->input('module_1'),
            'module_2' => $request->input('module_2'),
            'status' => 'En cours de traitement'
        ]);

        return back()->with('status', 'Votre demande de renouvellement a été bien pris en compte. Un accusé de reception vous sera envoyé par votre mail. Merci!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Renouvellement  $renouvellement
     * @return \Illuminate\Http\Response
     */
    public function show(Renouvellement $renouvellement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Renouvellement  $renouvellement
     * @return \Illuminate\Http\Response
     */
    public function edit(Renouvellement $renouvellement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Renouvellement  $renouvellement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renouvellement $renouvellement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Renouvellement  $renouvellement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renouvellement $renouvellement)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Renouvellement;
use App\Laboratoire;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $module1Name = Str::random(25);
        $module2Name = Str::random(25);
        $paidName = Str::random(25);

        $module_1 = $request->file('module_1');
        $module_2 = $request->file('module_2');
        $paiement = $request->file('paiement');

        // dd($module_1);

        $extension_1 = $module_1->extension();
        $extension_2 = $module_2->extension();
        $extensionPay = $paiement->extension();

        $destinationPath = storage_path('/app/public/uploads/renouvellement/'.Auth()->user()->id);

        $mod_1 = 'module_1-'.$request->input('numero_amm').'-'.$module1Name.'.'.$extension_1;
        $mod_2 = 'module_2-'.$request->input('numero_amm').'-'.$module2Name.'.'.$extension_2;
        $pay = 'paiement-'.$request->input('amm').'-'.$paidName.'.'.$extensionPay;

        $module_1->move($destinationPath, $mod_1);
        $module_2->move($destinationPath, $mod_2);
        $paiement->move($destinationPath, $pay);

        $renouvellement= Renouvellement::create([
            'user_id' => Auth()->user()->id,
            'produit' => $request->input('produit'),
            'numero_amm' => $request->input('numero_amm'),
            'labo_titulaire' => $request->input('labo_titulaire'),
            'module_1' => $module1Name,
            'module_2' => $module2Name,
            'paiement' => $paidName,
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

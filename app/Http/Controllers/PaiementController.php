<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enregistrement;

class PaiementController extends Controller
{
    public function paiement(Request $request){
            $enreg_id = $request->input('enreg_id');
            $update = Enregistrement::where('id','=',$enreg_id)->update(['paiement' => 'Payé' ]);

            return back()->with('success', 'Paiement enregistré');
    }
}

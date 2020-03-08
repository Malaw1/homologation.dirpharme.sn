<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\AccepterDepot;
use App\Mail\RefusDepot;
use App\Enregistrement;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function accepterdepot(Request $request){
    $this->validate($request, [
        'recipient' => 'required|email',
        'objet' => 'required',
        ]);

        $data = array(
            'recipient' => $request->recipient,
            'objet' => $request->objet,
            'message'   => $request->message,
            'medicament' =>$request->produit,
            'name'  =>$request->name
        );

            Mail::to($data['recipient'])->send(new AccepterDepot($data));

            $enreg_id = $request->input('enreg');
            $update = Enregistrement::where('id','=',$enreg_id)->update(['status' => 'Acceptée' ]);

            return back()->with('success', 'Votre message a ete bien envoye');
    }

    public function refusdepot(Request $request){
        $this->validate($request, [
            'recipient' => 'required|email',
            'objet' => 'required',
            ]);

            $data = array(
                'recipient' => $request->recipient,
                'objet' => $request->objet,
                'message'   => $request->message,
                'medicament' =>$request->produit,
                'name'  =>$request->name
            );

                Mail::to($data['recipient'])->send(new RefusDepot($data));

                $enreg_id = $request->input('enreg');
                $update = Enregistrement::where('id','=',$enreg_id)->update(['status' => 'Rejetée' ]);

                return back()->with('success', 'Votre message a ete bien envoye');
        }

}

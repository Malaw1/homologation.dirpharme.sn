<?php

namespace App\Http\Controllers;

use App\RcRecevabilite;
use App\Enregistrement;
use Illuminate\Http\Request;
use Response;

class RcRecevabiliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rapport = RcRecevabilite::join('recevabilites', 'recevabilites.id', '=', 'rc_recevabilites.recevabilite_id')
            ->join('enregistrements', 'enregistrements.id', '=', 'recevabilites.enreg_id')
            ->join('produits', 'enregistrements.id', '=', 'produits.enreg_id')
            ->where('recevabilites.user_id', Auth()->user()->id)->get();

        // dd($rapport);
        return view('recevabilite.rapports', ['rapport' => $rapport]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv,doc,docx,rtf|max:204800',
        ]);

        $fileName = 'RcRapport-'.time().'.'.$request->file->extension();

        $request->file->move(public_path('/storage/rapports/recevabilite'), $fileName);

        $rapport= RcRecevabilite::create([
            'user_id' => Auth()->user()->id,
            'filename' => $fileName,
            'recevabilite_id' => $request->input('recevabilite_id'),
            'commentaire' => $request->input('commentaire')
        ]);

        $enreg = Enregistrement::join('recevabilites', 'recevabilites.enreg_id', '=', 'enregistrements.id')
        ->where('recevabilites.id', $request->input('recevabilite_id'))
        ->first();

        // dd($enreg);
        $update = Enregistrement::where('id','=',$enreg->enreg_id)->update(['recevable' => $request->input('decision'), 'received_by' => Auth()->user()->id]);

        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RcRecevabilite  $rcRecevabilite
     * @return \Illuminate\Http\Response
     */
    public function show(RcRecevabilite $rcRecevabilite)
    {
        $filename = $_GET['file'];
        $path = storage_path('public/uploads/rapports/recevabilite'.$filename);

        return response()->file($path);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RcRecevabilite  $rcRecevabilite
     * @return \Illuminate\Http\Response
     */
    public function edit(RcRecevabilite $rcRecevabilite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RcRecevabilite  $rcRecevabilite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RcRecevabilite $rcRecevabilite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RcRecevabilite  $rcRecevabilite
     * @return \Illuminate\Http\Response
     */
    public function destroy(RcRecevabilite $rcRecevabilite)
    {
        //
    }
}

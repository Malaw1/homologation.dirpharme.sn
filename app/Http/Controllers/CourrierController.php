<?php

namespace App\Http\Controllers;

use App\Courrier;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courrier = DB::table('courriers')->get();
        return view('courrier.index', ['courrier' => $courrier]);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deposer()
    {
        return view('courrier.deposer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $numero = '000000';
        $filename = Str::random(25);
        $doc = $request->file('fichier');
        $extension = $doc->extension();
        dd($extension);
        $destinationPath = storage_path('/app/public/uploads/courrier/');
        $document = 'Courrier-'.$numero.'-'.$filename.'.'.$extension;
        $doc->move($destinationPath, $document);
        $courrier= Courrier::create([
            'emmeteur' => $request->input('emmetteur'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'numero' => $numero,
            'confidentiel' => $request->input('confidentiel'),
            'fichier' => $document,
        ]);

        return back()->with('status','Votre courrier est bien enregistré sous le numero'. $numero);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function show(Courrier $courrier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courrier $courrier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courrier $courrier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courrier $courrier)
    {
        //
    }
}

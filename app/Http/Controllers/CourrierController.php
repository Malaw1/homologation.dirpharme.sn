<?php

namespace App\Http\Controllers;

use App\Courrier;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class CourrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courrier = DB::table('courriers')
        ->where('destinataire', NULL)
        ->get();
    
        return view('courrier.index', ['courrier' => $courrier]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courrier.create');
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

    public function depart()
    {
        $courrier = DB::table('courriers')
        ->where('emmetteur', NULL)
        ->get();
    
        return view('courrier.depart', ['courrier' => $courrier]);
    }

    public function confidentiel()
    {
        $courrier = DB::table('courriers')
        ->where('confidentialite', 'on')
        ->get();
    
        return view('courrier.confidentiel', ['courrier' => $courrier]);
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
        $enr = Courrier::All()->last();

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

        $filename = Str::random(25);
        $doc = $request->file('fichier');
        // dd($doc);
        $extension = $doc->extension();
        // dd($extension);
        $destinationPath = storage_path('/app/public/uploads/courrier');
        $document = 'Courrier-'.$numero.'-'.$filename.'.'.$extension;
        $doc->move($destinationPath, $document);
        $courrier= Courrier::create([
            'emmetteur' => $request->input('emmetteur'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'numero' => $numero,
            'confidentialite' => $request->input('confidentialite'),
            'fichier' => $document,
        ]);

        return back()->with('status','Votre courrier est bien enregistré sous le numero: '. $numero);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courrier  $courrier
     * @return \Illuminate\Http\Response
     */
    public function show(Courrier $courrier)
    {
        $filename = $_GET['file'];
        $path = storage_path('/app/public/uploads/courrier');
        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
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

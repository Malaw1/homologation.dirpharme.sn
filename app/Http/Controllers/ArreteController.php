<?php

namespace App\Http\Controllers;

use App\Arrete;
use Illuminate\Http\Request;
use Hash;
use Response;
use QrCode;
use Illuminate\Support\Str;



class ArreteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arretes = Arrete::All();
        return view('arrete.index', ['arretes' => $arretes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('arrete.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pin = mt_rand(10, 9999)
            . mt_rand(10, 9999);

        $numero = $request->input('numero_amm');
        $split = str_split($numero, 2);

        $code_1 = date('d').''.$split[1];
        $code_2 = $split[0].''.date('m');

        $code = $code_1.'RF'.$pin.'/'.$code_2;
        // dd($code);

        $file = $request->file('file');
        $extension = $file->extension()?: 'pdf';
        $autorisation = $request->input('numero_amm');
        $numero = $request->input('numero');
        $destinationPath = storage_path('arretes');
        $filename = Str::random(100) . '.' . $extension;
        // dd($filename, $autorisation, $numero);
        $file->move($destinationPath, $filename);

        // dd($request);
        $arrete= Arrete::create([
            'autorisation_id' => $autorisation,
            'filename' => $filename,
            'numero_amm' => $request->input('numero_amm'),
            'date' => $request->input('date'),
            'laboratoire' => $request->input('laboratoire'),
            'produit' => $request->input('produit'),
            'type' => $request->input('type'),
            'user_id' => Auth()->user()->id,
            'serie' => $code
        ]);

        $split = str_split($numero, 4);

        QrCode::size(700)
            ->format('png')
            ->generate('https://www.dirpharme.net/arrete/'.$arrete->id.'?097DJ5JDEwJEIva1Q4dzMzVjY4R0QyQ2FhLkthOU9FZE4zZ2RPb2NQd3MzQzFoUEhVZDJ4eUdUZXI4TG1x='.$filename, public_path('qrcodes/'.$filename.'.png'));

        return back()->with('status', 'Fichier enregistré avec succés');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Arrete  $arrete
     * @return \Illuminate\Http\Response
     */
    public function show(Arrete $arrete)
    {
        $password = null;

        $filename = $_GET['097DJ5JDEwJEIva1Q4dzMzVjY4R0QyQ2FhLkthOU9FZE4zZ2RPb2NQd3MzQzFoUEhVZDJ4eUdUZXI4TG1x'];
        // $path = storage_path('arrete/'.$filename);
        $path = storage_path('arretes/'.$filename);

        // dd($filename);
        $url = base64_encode(Hash::make($path));

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Arrete  $arrete
     * @return \Illuminate\Http\Response
     */
    public function edit(Arrete $arrete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Arrete  $arrete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arrete $arrete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Arrete  $arrete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arrete $arrete)
    {
        //
    }
}

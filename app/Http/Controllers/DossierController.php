<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Enregistrement;
use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dossier.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dossier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = Str::random(25);
        $module = $request->file('modules');
        // dd($module->getClientOriginalName());
        $extension = $module->extension();
        // dd($extension);
        $moduleNumber = $request->input('moduleNumber');
        $destinationPath = storage_path('/app/public/uploads/modules/'.Auth()->user()->id.'/'.$request->input('enreg_id'));
        $moduleName = 'module-'.$moduleNumber.'-'.$filename.'.'.$extension;
        $module->move($destinationPath, $moduleName);
        $labo= Dossier::create([
            'label' => $request->input('label'),
            'fileName' => $moduleName,
            'user_id' => Auth()->user()->id,
            'enreg_id' => $request->input('enreg_id')
        ]);

        return back()->with('status','Votre '.$request->input('label').' a été bien uploader..!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function show(Dossier $dossier)
    {
        $filename = $_GET['file'];
        $path = storage_path('app/public/uploads/modules/'.$dossier->user_id.'/'.$dossier->enreg_id.'/'.$filename);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function edit(Dossier $dossier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dossier $dossier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dossier $dossier)
    {
        //
    }
}

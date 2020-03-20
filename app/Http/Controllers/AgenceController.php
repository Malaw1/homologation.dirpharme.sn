<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AgenceController extends Controller
{
    public function index()
    {
        $agence = DB::table('users')->where('role', 'agence')->get();
        return view('agence.index', ['agence' => $agence]);
    }
}

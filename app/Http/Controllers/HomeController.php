<?php

namespace App\Http\Controllers;
use App\Mail\AccepterDepot;
use Mail;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

public function accepterdepot()
{
   $name = 'Dirpharme';
   $to = '';

   dd($name);
   Mail::to('djibsone51@gmail.com')->send(new AccepterDepot($name));

   return 'Email was sent';
}
}

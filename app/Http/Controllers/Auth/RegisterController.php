<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'adresse' => ['required', 'string'],
            'pays'  =>  ['required', 'string'],
            'region' => ['required', 'string'],
            'telephone' => ['required', 'string'],
            'agree' => ['required', 'string'],
            'role' => 'required|in:admin,labo,agence,superadmin,pharmacien', //validate role input
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if($data['role'] != 'pharmacien'){
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                'adresse' => $data['adresse'],
                'pays' => $data['pays'],
                'region' => $data['region'],
                'zip' => $data['zip'],
                'password' => Hash::make($data['password']),
                'role' => $data['role'],
                'agree' => $data['agree']
            ]);

        }else{
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                'adresse' => $data['adresse'],
                'password' => Hash::make($data['password']),
                'role' => $data['role']
            ]);
        }
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

// Email
Route::post('accepterdepot', 'MailController@accepterdepot');
Route::post('refusdepot', 'MailController@refusdepot');

// Enregistrement
Route::resource('enregistrement', 'EnregistrementController');

// Laboratoire
Route::resource('laboratoire', 'LaboratoireController');

Route::resource('recevabilite', 'RecevabiliteController');

Route::resource('dossier', 'DossierController');


Route::resource('rc_rapport', 'RcRecevabiliteController');

Route::resource('evaluation', 'EvaluationController');

Route::resource('renouvellement', 'RenouvellementController');

Route::resource('arrete', 'ArreteController');

Route::resource('visiteurs', 'VisiteurController');

Route::resource('commission', 'CommissionController');

Route::resource('agence', 'AgenceController');

Route::post('paiement', 'PaiementController@paiement');

Route::post('echantillon', 'EchantillonController@echantillon');
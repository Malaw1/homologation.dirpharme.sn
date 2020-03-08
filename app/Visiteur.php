<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    protected $fillable = [
        'prenom', 'nom', 'adresse', 'email', 'telephone', 'photo', 'agence_id', 'date_naiss', 'lieu_naiss'
    ];
}

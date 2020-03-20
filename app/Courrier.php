<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    protected $fillable = [
        'numero',
        'emmetteur',
        'destinataire',
        'phone',
        'email',
        'fichier',
        'confidentialite'
    ];
}

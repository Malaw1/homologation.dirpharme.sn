<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renouvellement extends Model
{
    protected $fillable = [
        'user_id', 'labo_titulaire', 'module_1', 'module_2', 'status', 'numero_amm', 'produit'
    ];
}

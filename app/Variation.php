<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $fillable = [
        'user_id', 'laboratoire', 'dossier', 'paiement', 'amm', 'produit'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enregistrement extends Model
{
    protected $fillable = [
        'type', 'laboratoire', 'numero', 'paiement', 'status', 'completude', 'completude_by', 'recevable', 'received_by', 'evaluation', 'evaluated_by', 'commission_id', 'user_id'
    ];
}

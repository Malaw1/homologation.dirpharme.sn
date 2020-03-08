<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RcRecevabilite extends Model
{
    protected $fillable = [
        'user_id', 'filename', 'recevabilite_id', 'commentaire'
    ];
}

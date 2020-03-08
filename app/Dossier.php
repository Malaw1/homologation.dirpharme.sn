<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $fillable = [
        'label',
        'moduleNumber',
        'fileName',
        'user_id',
        'enreg_id',
    ];
}

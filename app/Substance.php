<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Substance extends Model
{
    protected $fillable = [
        'substance',
        'dosage',
        'enreg_id',
        'unite'
    ];
}

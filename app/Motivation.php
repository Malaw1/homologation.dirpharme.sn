<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivation extends Model
{
    protected $fillable = [
        'motivation', 'enreg_id'
    ];
}

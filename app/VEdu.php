<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VEdu extends Model
{
    protected $fillable = [
        'etablissement', 'diplome', 'annee', 'description', 'v_id'
    ];
}

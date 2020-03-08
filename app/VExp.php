<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VExp extends Model
{
    protected $fillable = [
        'date_debut', 'date_fin', 'structure', 'description', 'visiteur_id'
    ];
}

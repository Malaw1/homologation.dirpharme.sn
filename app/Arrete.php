<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrete extends Model
{
    protected $fillable = ['numero_amm', 'laboratoire', 'filename', 'serie', 'type', 'produit', 'user_id', 'date'];

}

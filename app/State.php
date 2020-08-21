<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $timestamps = true;
    
    public function Country()
    {
        return $this->belongsTo('App\Country', 'countryId', 'id');
    }
}

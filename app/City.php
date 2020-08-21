<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = true;
    
    public function State()
    {
        return $this->belongsTo('App\State', 'stateId', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public $timestamps = true;
    
    public function City()
    {
        return $this->belongsTo('App\City', 'cityId', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialNetwork extends Model
{
    public $timestamps = true;
    
    public function SocialNetworkType()
    {
        return $this->belongsTo('App\SocialNetworkType', 'socialNetworkTypeId', 'id');
    }
}

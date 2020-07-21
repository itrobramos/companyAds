<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public $timestamps = true;
    
    public function Category()
    {
        return $this->belongsTo('App\Category', 'categoryId', 'id');
    }
}

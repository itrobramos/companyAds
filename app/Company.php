<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = true;

    public function Branches()
    {
        return $this->hasMany('App\Branch', 'companyId', 'Id');
    }

    public function Subcategory()
    {
        return $this->belongsTo('App\SubCategory', 'subcategoryId', 'Id');
    }
    
}

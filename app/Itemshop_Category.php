<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itemshop_Category extends Model
{
    public function items()
    {
        return $this->belongsTo('App\Itemshop');
    }
}

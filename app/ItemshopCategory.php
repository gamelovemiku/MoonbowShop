<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemshopCategory extends Model
{
    protected $table = 'itemshop_category'; // ชื่อตาราง
    protected $primaryKey = 'category_id'; // ชื่อ Primary Key

    public function items()
    {
        return $this->hasOne('App\Itemshop', 'category_id');
    }

}

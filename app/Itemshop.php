<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itemshop extends Model
{
    protected $table = 'itemshop'; // ชื่อตาราง
    protected $primaryKey = 'item_id'; // ชื่อ Primary Key

    public function category()
	{
		return $this->hasOne('App\Itemshop_Category');
	}

}

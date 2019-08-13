<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itemshop extends Model
{
    protected $table = 'itemshop'; // ชื่อตาราง
    protected $primaryKey = 'item_id'; // ชื่อ Primary Key

    protected $fillable = ['item_name', 'item_desc', 'item_image_path', 'item_price', 'category_id', 'item_command', 'item_sold'];

    public function category()
	{
		return $this->hasOne('App\Itemshop_Category');
	}

}

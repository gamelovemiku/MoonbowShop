<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Itemshop extends Model
{
    use SoftDeletes;

    protected $table = 'itemshop'; // ชื่อตาราง
    protected $primaryKey = 'item_id'; // ชื่อ Primary Key

    protected $fillable = ['item_name', 'item_desc', 'item_image_path', 'item_price', 'category_id', 'item_command', 'item_sold', 'item_discount_price'];

    public function category()
	{
		return $this->belongsTo('App\ItemshopCategory', 'category_id');
    }

    public function pocket()
	{
        return $this->hasMany('App\ItemshopPocket', 'item_id');
	}

    public function history()
	{
		return $this->belongsTo('App\ItemshopHistory', 'item_id');
    }

}

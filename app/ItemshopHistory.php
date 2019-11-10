<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemshopHistory extends Model
{
    protected $table = 'itemshop_history'; // ชื่อตาราง
    protected $primaryKey = 'history_id'; // ชื่อ Primary Key

    protected $fillable = ['item_id', 'buyer_id'];

    public function item()
	{
        return $this->hasMany('App\Itemshop', 'item_id');
    }

    public function user()
	{
        return $this->belongsTo('App\User', 'buyer_id');
    }
}

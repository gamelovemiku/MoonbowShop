<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemshopPocket extends Model
{
    protected $table = 'itemshop_pockets'; // ชื่อตาราง
    protected $primaryKey = 'pocket_id'; // ชื่อ Primary Key

    protected $fillable = [
        'item_id', 'owner_id', 'is_claimed',
    ];

    public function item()
    {
        return $this->belongsTo('App\Itemshop', 'item_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'owner_id');
    }

}

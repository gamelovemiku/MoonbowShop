<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redeem extends Model
{
    protected $table = 'redeem'; // ชื่อตาราง
    protected $primaryKey = 'redeem_id'; // ชื่อ Primary Key

    public function claim()
    {
        return $this->hasOne('App\RedeemClaimed', 'redeem_claimed_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'topic_author_id');
    }

}

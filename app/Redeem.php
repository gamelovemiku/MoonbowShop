<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Redeem extends Model
{
    protected $table = 'redeem'; // ชื่อตาราง
    protected $primaryKey = 'redeem_id'; // ชื่อ Primary Key

    protected $fillable = [
        'redeem_code', 'redeem_desc', 'redeem_reward_command', 'redeem_limit', 'redeem_count',
    ];

    public function claim()
    {
        return $this->hasOne('App\RedeemClaimed', 'redeem_claimed_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'topic_author_id');
    }

}

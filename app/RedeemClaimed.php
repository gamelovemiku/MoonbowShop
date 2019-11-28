<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedeemClaimed extends Model
{
    protected $table = 'redeem_claimed'; // ชื่อตาราง
    protected $primaryKey = 'redeem_claimed_id'; // ชื่อ Primary Key

    protected $fillable = [
        'redeem_code_id', 'claimer_id',
    ];

    public function redeem()
    {
        return $this->belongsTo('App\Redeem');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RedeemClaimed extends Model
{
    protected $table = 'redeem_claimed'; // ชื่อตาราง
    protected $primaryKey = 'redeem_claimed_id'; // ชื่อ Primary Key

    protected $fillable = [
        'topic_author_id', 'topic_title', 'topic_category_id', 'topic_content', 'topic_views',
    ];

}

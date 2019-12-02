<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $table = 'notices'; // ชื่อตาราง
    protected $primaryKey = 'notice_id'; // ชื่อ Primary Key

    protected $fillable = ['notice_id', 'notice_title', 'notice_content', 'notice_views', 'notice_tag', 'notice_show_on_store'];

}

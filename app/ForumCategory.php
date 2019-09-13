<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $table = 'forum_comments'; // ชื่อตาราง
    protected $primaryKey = 'comment_id'; // ชื่อ Primary Key

    protected $fillable = [
        'comment_author_id', 'comment_title', 'comment_content',
    ];
}

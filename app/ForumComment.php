<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    protected $table = 'forum_comments'; // ชื่อตาราง
    protected $primaryKey = 'comment_id'; // ชื่อ Primary Key

    protected $fillable = [
        'comment_author_id', 'comment_title', 'comment_content',
    ];

    public function topic()
    {
        return $this->belongsTo('App\ForumTopic', 'topic_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'comment_author_id');
    }

}

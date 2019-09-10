<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumTopic extends Model
{
    protected $table = 'forum_topics'; // ชื่อตาราง
    protected $primaryKey = 'topic_id'; // ชื่อ Primary Key

    protected $fillable = [
        'topic_author_id', 'topic_title', 'topic_content', 'topic_views',
    ];

    public function comment()
    {
        return $this->hasMany('App\ForumComment', 'topic_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'topic_author_id');
    }

}

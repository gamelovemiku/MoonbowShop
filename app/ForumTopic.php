<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumTopic extends Model
{
    use SoftDeletes;

    protected $table = 'forum_topics'; // ชื่อตาราง
    protected $primaryKey = 'topic_id'; // ชื่อ Primary Key

    protected $fillable = [
        'topic_author_id', 'topic_title', 'topic_category_id', 'topic_content', 'topic_views',
    ];

    public function comment()
    {
        return $this->hasMany('App\ForumComment', 'topic_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'topic_author_id');
    }

    public function category()
    {
        return $this->hasOne('App\ForumCategory', 'forum_category_id', 'topic_category_id');
    }

}

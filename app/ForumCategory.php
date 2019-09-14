<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $table = 'forum_categories'; // ชื่อตาราง
    protected $primaryKey = 'forum_category_id'; // ชื่อ Primary Key

    protected $fillable = [
        'forum_category_name', 'forum_category_description'
    ];

    public function items()
    {
        return $this->belongsTo('App\ForumTopic', 'forum_category_id');
    }

}

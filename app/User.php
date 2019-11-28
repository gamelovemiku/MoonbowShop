<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password', 'points_balance', 'role_id', 'profile_image_path',
        'realname', 'ip', 'lastlogin', 'x', 'y', 'z', 'world', 'regdate', 'regip', 'yaw', 'pitch', 'isLogged',
        'hasSession', 'totp'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
	{
		return $this->hasOne('App\Role', 'role_id', 'role_id');
    }

    public function topic()
    {
        return $this->belongsTo('App\ForumTopic', 'topic_id');
    }

    public function comment()
    {
        return $this->belongsTo('App\ForumComment', 'comment_id');
    }

    public function pocket()
    {
        return $this->belongsTo('App\ItemshopPocket', 'id');
    }

    public function history()
    {
        return $this->hasMany('App\ItemshopHistory', 'buyer_id', 'id');
    }

}

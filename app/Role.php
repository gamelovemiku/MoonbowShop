<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'users_roles'; // ชื่อตาราง
    protected $primaryKey = 'role_id'; // ชื่อ Primary Key

    public function user()
    {
        return $this->belongsTo('App\User', 'role_id', 'role_id');
    }

}



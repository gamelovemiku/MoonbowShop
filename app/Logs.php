<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'logs'; // ชื่อตาราง
    protected $primaryKey = 'log_id'; // ชื่อ Primary Key

    protected $fillable = ['user_id', 'type', 'action_detail'];

}

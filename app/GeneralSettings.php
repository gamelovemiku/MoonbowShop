<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
    protected $table = 'general_settings'; // ชื่อตาราง
    protected $primaryKey = 'setting_id'; // ชื่อ Primary Key

    protected $fillable = [
        'hostname', 'hostname_port', 'rcon_port', 'rcon_password', 'website_name', 'website_desc', 'website_footer',
    ];
}

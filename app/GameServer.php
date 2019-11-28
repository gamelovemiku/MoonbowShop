<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameServer extends Model
{
    protected $table = 'game_servers';
    protected $primaryKey = 'server_id';

    protected $fillable = [
        'server_name', 'hostname', 'hostname_port', 'hostname_query_port', 'rcon_port', 'rcon_password', 'websender_port', 'websender_password'
    ];

}

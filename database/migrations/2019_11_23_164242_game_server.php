<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameServer extends Migration
{
    public function up()
    {
        Schema::create('game_servers', function (Blueprint $table) {

            $table->bigIncrements('server_id');
            $table->string('server_name');

            $table->string('hostname');
            $table->integer('hostname_port');
            $table->integer('hostname_query_port');

            $table->integer('rcon_port');
            $table->string('rcon_password')->nullable();

            $table->integer('websender_port');
            $table->string('websender_password')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_servers');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RedeemCode extends Migration
{

    public function up()
    {
        Schema::create('redeem_code', function (Blueprint $table) {
            $table->string('redeem_id')->primary();
            $table->string('redeem_name');
            $table->string('player_id');
            $table->boolval('is_claim');
            $table->string('reward_command');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('redeem_code');
    }
}

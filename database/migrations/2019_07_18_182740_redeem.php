<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Redeem extends Migration
{

    public function up()
    {
        Schema::create('redeem', function (Blueprint $table) {
            $table->bigIncrements('redeem_id');
            $table->string('redeem_code')->unique();
            $table->string('redeem_desc');
            $table->string('redeem_reward_command');
            $table->boolean('redeem_limit');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('redeem');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RedeemClaimed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeem_claimed', function (Blueprint $table) {
            $table->bigIncrements('redeem_claimed_id');

            $table->unsignedBigInteger('redeem_code_id');
            $table->foreign('redeem_code_id')->references('redeem_id')->on('redeem')->onDelete('cascade');

            $table->unsignedBigInteger('claimer_id');
            $table->foreign('claimer_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('redeem_claimed');
    }
}

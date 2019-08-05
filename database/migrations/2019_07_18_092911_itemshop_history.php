<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItemshopHistory extends Migration
{
    public function up()
    {
        Schema::create('itemshop_history', function (Blueprint $table) {
            $table->bigIncrements('history_id');
            $table->unsignedBigInteger('item_id');
            $table->foreign('item_id')->references('item_id')->on('itemshop')->onDelete('cascade');
            $table->unsignedBigInteger('buyer_id');
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('itemshop_history');
    }
}

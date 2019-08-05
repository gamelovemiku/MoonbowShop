<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Itemshop extends Migration
{
    public function up()
    {
        Schema::create('itemshop', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->string('item_name', '16');
            $table->string('item_desc', '30');
            $table->string('item_image_path');
            $table->mediumInteger('item_price');
            $table->string('item_category');
            $table->string('item_command');
            $table->mediumInteger('item_sold');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itemshop');
    }
}

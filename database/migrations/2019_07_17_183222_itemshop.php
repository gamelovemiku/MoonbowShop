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
            $table->string('item_name', '30');
            $table->string('item_desc', '30');
            $table->string('item_image_path');
            $table->mediumInteger('item_price');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('itemshop_category')->onDelete('cascade');

            $table->string('item_command');
            $table->mediumInteger('item_sold');
            $table->timestamps();
            $table->softDeletes();
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

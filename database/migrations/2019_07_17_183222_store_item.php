<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoreItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_item', function (Blueprint $table) {
            $table->string('item_id')->primary();
            $table->string('item_name', '16');
            $table->string('item_desc', '30');
            $table->string('item_image_path');
            $table->mediumInteger('item_price');
            $table->string('item_category');
            $table->string('item_command');
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
        Schema::dropIfExists('store_item');
    }
}

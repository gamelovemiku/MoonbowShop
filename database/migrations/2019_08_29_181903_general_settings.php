<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GeneralSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->bigIncrements('setting_id');
            $table->string('hostname');
            $table->integer('hostname_port');
            $table->integer('rcon_port');
            $table->string('rcon_password')->nullable();
            $table->string('website_name');
            $table->string('website_desc')->nullable();
            $table->string('website_footer')->nullable();
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
        Schema::dropIfExists('general_settings');
    }
}

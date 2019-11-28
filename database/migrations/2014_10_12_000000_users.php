<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->unique('name');
            $table->string('realname')->default('Player');;

            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->double('points_balance', 8, 2); //เก็บค่าเงินสมาชิก

            $table->unsignedBigInteger('role_id')->default(2);;
            $table->foreign('role_id')->references('role_id')->on('users_roles')->onDelete('cascade');

            $table->string('profile_image_path')->nullable();

            //AuthMe Data
            $table->string('ip', 40)->nullable();
			$table->bigInteger('lastlogin')->nullable();
			$table->float('x', 10, 0)->default(0);
			$table->float('y', 10, 0)->default(0);
			$table->float('z', 10, 0)->default(0);
			$table->string('world')->default('world');
			$table->bigInteger('regdate')->default(0);
			$table->string('regip', 40)->nullable();
			$table->float('yaw', 10, 0)->nullable();
			$table->float('pitch', 10, 0)->nullable();
			$table->smallInteger('isLogged')->default(0);
			$table->smallInteger('hasSession')->default(0);
			$table->string('totp', 16)->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Authme extends Migration {

	public function up()
	{
		Schema::create('authme', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username')->unique('username');
			$table->string('realname');
            $table->string('password');
            
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
			//$table->string('email')->nullable();
			$table->smallInteger('isLogged')->default(0);
			$table->smallInteger('hasSession')->default(0);
			$table->string('totp', 16)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('authme');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('password');
			$table->string('city_id')->nullable();
			$table->string('phone')->nullable();
			$table->string('cover')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}

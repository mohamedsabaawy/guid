<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelsTable extends Migration {

	public function up()
	{
		Schema::create('hotels', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('cover')->nullable();
			$table->decimal('longitude', 10,8)->nullable();
			$table->decimal('latitude', 10,8)->nullable();
			$table->integer('restaurant')->nullable();
			$table->integer('city_id');
			$table->string('user_id');
			$table->text('details')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('hotels');
	}
}
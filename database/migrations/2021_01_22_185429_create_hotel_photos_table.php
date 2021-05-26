<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHotelPhotosTable extends Migration {

	public function up()
	{
		Schema::create('hotel_photos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('hotel_id');
		});
	}

	public function down()
	{
		Schema::drop('hotel_photos');
	}
}
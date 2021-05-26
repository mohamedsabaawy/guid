<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLandmarkPhotosTable extends Migration {

	public function up()
	{
		Schema::create('landmark_photos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->integer('landmark_id');
		});
	}

	public function down()
	{
		Schema::drop('landmark_photos');
	}
}
<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use AdminSeeder;

class DatabaseSeeder extends Seeder {

	public function run()
	{
//		Model::unguard();
		$this->call([
		   AdminSeeder::class
        ]);
	}
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use PhotoShots\User;
use PhotoShots\Album;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

	//Because we have a foreign key between the album and the user
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		Model::unguard();
//We need to truncate the data to avoid duplication
		User::truncate();
		Album::truncate();

		$this->call('UserTableSeeder');
		$this->call('AlbumTableSeeder');
	}

}

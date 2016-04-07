<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use PhotoShots\Album;
use PhotoShots\User;

class AlbumTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

	$users = User::all();
//This will populate the album table inside the database with description of the album and whose user it belongs to.
	foreach ($users as $user)
	{

		$number = mt_rand(0,15);

		for ($i=0; $i < $number; $i++)
		{
			Album::create
			(

				[

					'title' => "Title album $i of $user->id",
					'description' => "Description album $i of $user->id",
					'user_id' => $user->id
				]

				);
		}
	}

	}

}

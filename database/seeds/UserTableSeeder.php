<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use PhotoShots\User;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	//This will populate the user table inside the database up to 50 users with an encrypted password, emails addresses answer and question
		for ($i=0; $i <50 ; $i++)
		{
			User::create
			(
				[
					'name' => "User $i",
					'email' => "user$i@users.com",
					'password' => bcrypt ('pass'),
					'question' => 'quest',
					'answer' => bcrypt('ans')
				]
				);
		}
	}
}

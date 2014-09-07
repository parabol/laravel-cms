<?php

class ThrottleTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('throttle')->truncate();
        
		\DB::table('throttle')->insert(array (
			0 => 
			array (
				'id' => 1,
				'user_id' => 1,
				'ip_address' => '::1',
				'attempts' => 0,
				'suspended' => 0,
				'banned' => 0,
				'last_attempt_at' => NULL,
				'suspended_at' => NULL,
				'banned_at' => NULL,
			),
			1 => 
			array (
				'id' => 2,
				'user_id' => 1,
				'ip_address' => '127.0.0.1',
				'attempts' => 0,
				'suspended' => 0,
				'banned' => 0,
				'last_attempt_at' => NULL,
				'suspended_at' => NULL,
				'banned_at' => NULL,
			),
			2 => 
			array (
				'id' => 3,
				'user_id' => 2,
				'ip_address' => NULL,
				'attempts' => 0,
				'suspended' => 0,
				'banned' => 0,
				'last_attempt_at' => NULL,
				'suspended_at' => NULL,
				'banned_at' => NULL,
			),
		));
	}

}

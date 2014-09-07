<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('users')->truncate();
        
		\DB::table('users')->insert(array (
			0 => 
			array (
				'id' => 1,
				'email' => 'admin@vietsol.net',
				'username' => 'admin',
				'password' => '$2y$10$fpV7RB031XECvEnw6PAUd.n945GoUTcOSKx00Fawv4kmesGyIyOVa',
				'permissions' => NULL,
				'activated' => 1,
				'activation_code' => NULL,
				'activated_at' => '2014-08-19 06:50:17',
				'last_login' => '2014-09-07 06:43:53',
				'persist_code' => '$2y$10$pNjqswJ15C7Dbm9l3DVpFOgih17PuJ/vWckjolB1unQiFfixKzInK',
				'reset_password_code' => NULL,
				'first_name' => NULL,
				'last_name' => NULL,
				'created_at' => '2014-08-19 06:50:17',
				'updated_at' => '2014-09-07 06:43:53',
			),
			1 => 
			array (
				'id' => 2,
				'email' => 'khachhang@vietsol.net',
				'username' => 'khachhang',
				'password' => '$2y$10$ujUsfh1Bg7kujua6Xnbrm.AqYDCzwju0ESoEeGcKfvkGnp1u4ZT.e',
				'permissions' => '',
				'activated' => 1,
				'activation_code' => NULL,
				'activated_at' => '2014-09-07 06:59:02',
				'last_login' => NULL,
				'persist_code' => NULL,
				'reset_password_code' => NULL,
				'first_name' => '',
				'last_name' => '',
				'created_at' => '2014-09-07 06:59:02',
				'updated_at' => '2014-09-07 06:59:02',
			),
		));
	}

}

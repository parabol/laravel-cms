<?php

class GroupsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('groups')->truncate();
        
		\DB::table('groups')->insert(array (
			0 => 
			array (
				'id' => 1,
				'name' => 'Admin',
				'permissions' => '{"superuser":1}',
				'created_at' => '2014-08-19 06:48:55',
				'updated_at' => '2014-08-19 06:48:55',
			),
		));
	}

}

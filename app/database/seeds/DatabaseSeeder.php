<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('PagesTableSeeder');
		$this->call('TestsTableSeeder');
		$this->call('GroupsTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('ThrottleTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('UsersGroupsTableSeeder');
	}

}

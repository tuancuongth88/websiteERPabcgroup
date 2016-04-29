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

		$this->call('UserTableSeeder');
		$this->call('AdminTableSeeder');
		$this->call('DepartmentTableSeeder');
		$this->call('RegencyTableSeeder');
		$this->call('FunctionTableSeeder');
		$this->call('PermissionTableSeeder');
		$this->call('DepFunctionTableSeeder');
		$this->call('TempRoleTableSeeder');
		$this->call('ProjectTableSeeder');
		$this->call('DepUserRegencyTableSeeder');
	}

}

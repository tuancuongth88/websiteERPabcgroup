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
		$this->call('PermisstionTableSeeder');
		$this->call('Per_DepTableSeeder');
	}

}

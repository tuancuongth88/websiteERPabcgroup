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
		// $this->call('AdminTableSeeder');
		$this->call('DepartmentTableSeeder');
		$this->call('RegencyTableSeeder');
		$this->call('FunctionTableSeeder');
		$this->call('ButtonSalaryUserTableSeeder');
		// $this->call('PermissionTableSeeder');
		// $this->call('TempRoleTableSeeder');
		// $this->call('ProjectTableSeeder');
		// $this->call('ProjectUserTableSeeder');
		// $this->call('ProjectStatusTableSeeder');
		// $this->call('ReportTypeTableSeeder');
		// $this->call('TypeTableSeeder');
		// $this->call('RoleTableSeeder');
		// $this->call('SalarieUserTableSeeder');
		// $this->call('ButtonTableSeeder');
		$this->call('ButtonUserTableSeeder');
		// $this->call('TaskStatusTableSeeder');
		
	}

}


<?php

class FunctionTableSeeder extends Seeder {

	public function run()
	{
		AdminFunction::create([
					'name' => 'Quản lý hồ sơ cá nhân',
					'description'=>'Quản lý hồ sơ cá nhân',
			]);
		AdminFunction::create([
					'name' => 'Quản lý project',
					'description'=>'quan ly du an',
			]);
		AdminFunction::create([
					'name' => 'Quản lý công việc',
					'description'=>'quan ly work_plan',
			]);
		AdminFunction::create([
					'name' => 'Quản lý chức vụ',
					'description'=>'quan ly regencies',
			]);
	}

}
<?php

class FunctionTableSeeder extends Seeder {

	public function run()
	{
		AdminFunction::create([
			'name' => 'Quản lý nhân viên',
		]);
		// AdminFunction::create([
		// 	'name' => 'Quản lý báo cáo',
		// ]);
		AdminFunction::create([
			'name' => 'Quản lý công việc',
		]);
		AdminFunction::create([
			'name' => 'Quản lý lương nhân viên',
		]);

		AdminFunction::create([
			'name' => 'Quản lý dự án',
		]);
	}

}
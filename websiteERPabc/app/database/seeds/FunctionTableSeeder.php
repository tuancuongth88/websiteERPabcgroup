<?php

class FunctionTableSeeder extends Seeder {

	public function run()
	{
		Functions::create([
					'name' => 'Quản lý hồ sơ',
					'description'=>'quan ly hồ sơ',
			]);
		Functions::create([
					'name' => 'Quản lý cá nhân',
					'description'=>'quan ly cá nhân',
			]);
		Functions::create([
					'name' => 'Quản lý công việc',
					'description'=>'quan ly công việc',
			]);
		Functions::create([
					'name' => 'Quản lý báo cáo',
					'description'=>'quan ly báo cáo',
			]);
	}

}
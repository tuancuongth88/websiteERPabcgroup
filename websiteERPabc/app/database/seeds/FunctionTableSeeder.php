<?php

class FunctionTableSeeder extends Seeder {

	public function run()
	{
		AdminFunction::create([
			'name' => 'Quản lý nhân viên',
		]);
		AdminFunction::create([
			'name' => 'Quản lý báo cáo',
		]);
		AdminFunction::create([
			'name' => 'Quản lý công việc',
		]);
		AdminFunction::create([
			'name' => 'Quản lý lương nhân viên',
		]);
		AdminFunction::create([
			'name' => 'Quản lý dự án',
		]);
		AdminFunction::create([
			'name' => 'Quản lý công văn giấy tờ',
		]);
		AdminFunction::create([
			'name' => 'Quản lý hợp đồng',
		]);
		AdminFunction::create([
			'name' => 'Quản lý đối tác',
		]);
		//quan ly tai nguyen
		AdminFunction::create([
			'name' => 'Quản lý Thiết bị',
		]);
		AdminFunction::create([
			'name' => 'Quản lý máy tính',
		]);
		AdminFunction::create([
			'name' => 'Quản lý tài liệu',
		]);
		AdminFunction::create([
			'name' => 'Quản lý Tên miền',
		]);
		
	}
}
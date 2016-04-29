<?php

class PermissionTableSeeder extends Seeder {

	public function run()
	{
		Permission::create([
		 'name' => 'Full',
		]);
		Permission::create([
		 'name' => 'Thêm',
		]);
		Permission::create([
		 'name' => 'Xem',
		]);
		Permission::create([
		 'name' => 'Sửa',
		]);
		Permission::create([
		 'name' => 'Xóa',
		]);
		Permission::create([
		 'name' => 'Asign',
		]);
	}
}
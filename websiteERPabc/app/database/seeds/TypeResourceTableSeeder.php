<?php

class TypeResourceTableSeeder extends Seeder {

	public function run()
	{
		ResourceDevice::create([
				'name' => 'Thiết bị văn phòng',
			]);
		ResourceDevice::create([
				'name' => 'Máy tính',
			]);
		ResourceDevice::create([
				'name' => 'Tài liệu',
			]);
		ResourceDevice::create([
				'name' => 'Doimain',
			]);

	}

}
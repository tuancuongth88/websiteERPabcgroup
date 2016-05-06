<?php

class ProjectStatusTableSeeder extends Seeder {

	public function run()
	{
		ProjectStatus::create([
				'name' => 'Đang triển khai',
			]);
		ProjectStatus::create([
				'name' => 'Đã kết thúc',
			]);
		ProjectStatus::create([
				'name' => 'Đang tạm dừng',
			]);

	}

}
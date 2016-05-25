<?php

class TaskStatusTableSeeder extends Seeder {

	public function run()
	{
		TaskStatus::create([
				'name' => 'Chờ thực hiện',
			]);
		TaskStatus::create([
				'name' => 'Đang thực hiện',
			]);
		TaskStatus::create([
				'name' => 'Đã hoàn thành',
			]);
		TaskStatus::create([
				'name' => 'Đang tạm dừng',
			]);

	}

}
<?php

class ProjectTableSeeder extends Seeder {

	public function run()
	{
		Project::create([
				'name' => 'choinhanh.vn',
				'start' => '2016-04-29 14:30:00',
				'end' => '2016-05-31 14:30:00',
				'percent' => '50',
				'description' => 'choinhanh.vn',
				'status' => 1,
			]);

	}

}
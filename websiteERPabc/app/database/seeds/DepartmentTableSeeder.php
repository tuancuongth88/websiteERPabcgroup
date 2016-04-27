<?php

class DepartmentTableSeeder extends Seeder {

	public function run()
	{
		Department::create([
					'name' => 'Room developer',
					'status'=>'1',
			]);
		Department::create([
					'name' => 'Room sale',
					'status'=>'1',
			]);
	}

}
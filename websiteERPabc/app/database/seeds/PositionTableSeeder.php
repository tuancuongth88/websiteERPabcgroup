<?php

class PositionTableSeeder extends Seeder {

	public function run()
	{
		Position::create([
					'name' => 'Manager',
					'status'=>'1',
			]);
		Position::create([
					'name' => 'leader',
					'status'=>'1',
			]);
		Position::create([
					'name' => 'member',
					'status'=>'1',
			]);
	}

}
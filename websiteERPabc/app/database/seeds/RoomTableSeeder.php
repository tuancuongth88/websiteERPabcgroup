<?php

class RoomTableSeeder extends Seeder {

	public function run()
	{
		Room::create([
					'name' => 'Room developer',
					'status'=>'1',
			]);
		Room::create([
					'name' => 'Room sale',
					'status'=>'1',
			]);
	}

}
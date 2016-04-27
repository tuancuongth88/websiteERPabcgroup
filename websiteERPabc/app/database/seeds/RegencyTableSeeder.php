<?php

class RegencyTableSeeder extends Seeder {

	public function run()
	{
		Regency::create([
					'name' => 'Manager',
					'status'=>'1',
			]);
		Regency::create([
					'name' => 'leader',
					'status'=>'1',
			]);
		Regency::create([
					'name' => 'member',
					'status'=>'1',
			]);
	}

}
<?php

class FunctionTableSeeder extends Seeder {

	public function run()
	{
		Functions::create([
					'name' => 'Manager',
					'description'=>'quan ly',
			]);
		Functions::create([
					'name' => 'leader',
					'description'=>'quan ly',
			]);
		Functions::create([
					'name' => 'member',
					'description'=>'quan ly',
			]);
	}

}
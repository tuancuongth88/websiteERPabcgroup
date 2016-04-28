<?php

class PermisstionTableSeeder extends Seeder {

	public function run()
	{
		Permisstion::create([
					'name' => 'Manager',
					'description'=>'quan ly',
			]);
		Permisstion::create([
					'name' => 'leader',
					'description'=>'quan ly',
			]);
		Permisstion::create([
					'name' => 'member',
					'description'=>'quan ly',
			]);
	}

}
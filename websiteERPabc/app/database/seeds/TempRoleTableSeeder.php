<?php

class TempRoleTableSeeder extends Seeder {

	public function run()
	{
		TempRole::create([
					'name' => 'Manager',
					'parent_id' => NULL,
			]);
		TempRole::create([
					'name' => 'Leader',
					'parent_id' => 1,
			]);
		TempRole::create([
					'name' => 'Coder',
					'parent_id' => 2,
			]);

	}

}
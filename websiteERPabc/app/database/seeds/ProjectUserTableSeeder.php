<?php

class ProjectUserTableSeeder extends Seeder {

	public function run()
	{
		ProjectUser::create([
				'name' => '',
				'status' => 1,
				'project_id' => 1,
				'user_id' => 1,
				'temp_role_id' => 1,
				'per_id' => 1,
			]);
		ProjectUser::create([
				'name' => '',
				'status' => 1,
				'project_id' => 1,
				'user_id' => 2,
				'temp_role_id' => 2,
				'per_id' => 1,
			);
		ProjectUser::create([
				'name' => '',
				'status' => 1,
				'project_id' => 1,
				'user_id' => 3,
				'temp_role_id' => 3,
				'per_id' => 1,
			);

	}

}
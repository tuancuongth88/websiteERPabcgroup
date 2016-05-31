<?php

class SalarieUserTableSeeder extends Seeder {

	public function run()
	{
		SalaryUser::create([
					'salary'=>'10000000',
					'status'=>'1',
			]);
		SalaryUser::create([
					'salary'=>'20000000',
					'status'=>'1',
			]);
		SalaryUser::create([
					'salary'=>'30000000',
					'status'=>'1',
			]);
	}

}
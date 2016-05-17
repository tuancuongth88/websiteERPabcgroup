<?php

class ReportTypeTableSeeder extends Seeder {

	public function run()
	{
		TypeReport::create([
					'name'=>'Báo cáo tuần',
					'status'=>'1',
			]);
		TypeReport::create([
					'name'=>'Báo cáo ngày',
					'status'=>'1',
			]);
	}

}
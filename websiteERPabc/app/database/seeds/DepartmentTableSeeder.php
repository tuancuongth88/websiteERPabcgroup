<?php

class DepartmentTableSeeder extends Seeder {

	public function run()
	{
		Department::create([
					'name' => 'Phòng hành chính nhân sự',
					'status'=>'1',
			]);
		Department::create([
					'name' => 'Phòng tài chính kế toán',
					'status'=>'1',
			]);
		Department::create([
					'name' => 'Phòng kinh doanh',
					'status'=>'2',
			]);
		Department::create([
					'name' => 'Phòng nghiên cứu phát triển',
					'status'=>'2',
			]);
		Department::create([
					'name' => 'Phòng truyền thông',
					'status'=>'2',
			]);
		Department::create([
					'name' => 'Phòng kỹ thuật',
					'status'=>'1',
			]);
		Department::create([
					'name' => 'Phòng hỗ trợ dịch vụ',
					'status'=>'2',
			]);
	}

}
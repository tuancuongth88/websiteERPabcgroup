<?php

class ButtonSalaryUserTableSeeder extends Seeder {

	public function run()
	{
		ButtonFunction::create(['name' => 'Đề xuất lương', 'description' => 'Đề xuất lương dành cho kế toán', 'function_id' => 1]);
		ButtonFunction::create(['name' => 'Phê duyệt lương', 'description' => 'Người có quyền duyệt lương khi kế toán gửi nên đề xuất', 'function_id' => 1]);
	
	}

}
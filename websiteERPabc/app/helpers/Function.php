<?php
//get name file
function getFilename($filename = null)
{
	if($filename != '') {
		return pathinfo($filename, PATHINFO_FILENAME);
	}
	return null;
}

//get extension from filename
function getExtension($filename = null)
{
	if($filename != '') {
		return pathinfo($filename, PATHINFO_EXTENSION);
	}
	return null;
}
function getSalaryNew($input, $salary)
{
	if (!$salary) {
		return null;
	}
	if ($input['type_salary'] == TYPE_SALARY_UP) {
		$salaryNew = $salary->salary + ($input['percent'] * ($salary->salary))/100;
	}
	if ($input['type_salary'] == TYPE_SALARY_DOWN) {
		$salaryNew = $salary->salary - ($input['percent'] * ($salary->salary))/100;
	}
	return $salaryNew;
}
function getSalaryNew_admin_edit($input, $salary)
{
	if (!$salary) {
		return null;
	}
	if ($input['type_salary_edit'] == TYPE_SALARY_UP) {
		$salaryNew = $salary->salary + ($input['percent_edit'] * ($salary->salary))/100;
	}
	if ($input['type_salary_edit'] == TYPE_SALARY_DOWN) {
		$salaryNew = $salary->salary - ($input['percent_edit'] * ($salary->salary))/100;
	}
	return $salaryNew;
}
function getStatusHistory($input)
{
	if ($input->status == SALARY_APPROVE) {
		return 'Đã chấp nhận';
	}
	if ($input->status == SALARY_EDIT) {
		return 'Đã sửa';
	}
	if ($input->status == SALARY_REJECT) {
		return 'Đã từ chối';
	}
	if ($input->status == SALARY_PROPOSAL) {
		return 'Đang chờ';
	}

}

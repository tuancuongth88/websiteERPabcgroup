<?php
use Carbon\Carbon;
class CommonNormal
{
	public static function delete($id)
	{
		$name = self::commonName();
		$name::find($id)->delete();
	}

	public static function update($id, $input, $modelName = NULL)
	{
		$name = self::commonName();
		if($modelName) {
			$name = $modelName;
		}
		$name::find($id)->update($input);
	}

	public static function create($input, $name = NULL)
	{
		$name = self::commonName($name);
		$id = $name::create($input)->id;
		return $id;
	}
	public static function commonName($name = NULL)
	{
		if ($name == NULL) {
			$name = Request::segment(2);
		}
		if ($name == 'manager') {
			return 'Admin';
		}
		if ($name == 'management') {
			return 'User';
		}
		if($name == 'regency') {
			return 'Regency';
		}
		if($name == 'resouce') {
			return 'Resouce';
		}
		if($name == 'deparment') {
			return 'Department';
		}
		// if($name == 'depFunction') {
		// 	return 'DepRegencyPerFun';	
		// }
		if($name == 'tempRole') {
			return 'TempRole';
		}
		if($name == 'project') {
			return 'Project';
		}
		if($name == 'projectStatus') {
			return 'ProjectStatus';
		}
		if($name == 'task') {
			return 'Task';
		}
		if($name == 'user_type') {
			return 'TypeUser';
		}
		if($name == 'salary')
			return 'SalaryUser';
		if($name == 'taskStatus')
		{
			return 'TaskStatus';
		}
		if($name == 'storeAll')
		{
			return 'storeAll';
		}
		if($name == 'office')
		{
			return 'ResourceOffice';
		}
		if($name == 'computer')
		{
			return 'ResourceDeviceComputer';
		}
		if($name == 'domain')
		{
			return 'ResourceDomain';
		}
	}

}
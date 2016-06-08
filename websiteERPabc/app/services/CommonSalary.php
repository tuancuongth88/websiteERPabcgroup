<?php
class CommonSalary {

	public static function getListNoSalaryUser()
	{
		$listUser = User::where('role_id', '!=', ROLE_ADMIN)
			->whereNull('salary_id')
			->lists('username', 'id');
		return $listUser;
	}
	public static function getListUser()
	{
		return User::where('role_id', '!=', ROLE_ADMIN)->lists('username', 'id');
	}
	public static function getDepRegency($userId)
	{	
		$list = DepRegencyUserParent::where('user_id', $userId)->get();
		foreach ($list as $value) {
			$array[$value->id] = self::getNameDep($value->dep_id) . '-' . self::getNameRegency($value->regency_id); 
		}
		return $array;
	}
	public static function getNameDep($depId)
	{
		return Department::find($depId)->name;
	}
	public static function getNameRegency($regencyId)
	{
		return Regency::find($regencyId)->name;
	}
}
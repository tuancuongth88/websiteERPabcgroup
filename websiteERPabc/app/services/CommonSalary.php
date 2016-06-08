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
	public static function getTypeDepRegency()
	{
		return ['0' => 'Lựa chọn', PROPOSAL_DEP => 'Phòng ban', PROPOSAL_REGENCY => 'Chức vụ'];
	}

	public static function getTypeUpDow()
	{
		return [TYPE_SALARY_CHOOSE => 'Lựa chon', TYPE_SALARY_UP => 'Tăng lương', TYPE_SALARY_DOWN => 'Giảm lương'];
	}
	public static function getModelName($input)
	{
		if ($input['type_dep_regency'] == PROPOSAL_DEP) {
			return 'Department';
		}
		if ($input['type_dep_regency'] == PROPOSAL_REGENCY) {
			return 'Regency';
		}
	}
	public static function getType($input)
	{
		return $input['type_dep_regency'];
	}
}

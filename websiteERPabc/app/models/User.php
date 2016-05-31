<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	protected $fillable = array('email', 'password', 'username', 'name' , 'phone', 'address', 'avatar', 'fullname', 'dep_id', 'regency_id', 'status', 'date_of_birth', 'sex', 'ethnic', 'identity_card', 'current_address', 'personal_file', 'medical_file', 'curriculum_vitae_file', 'degree', 'skyper', 'number_tax', 'number_insure', 'marriage', 'note', 'type_id', 'salary_id', 'start_time', 'end_time', 'role_id');
	 protected $dates = ['deleted_at'];

	public function department()
	{
		return $this->belongsToMany('Department', 'dep_user_regencies', 'user_id', 'dep_id');
	}
	
	public function regencies()
	{
		return $this->belongsToMany('Regency', 'dep_user_regencies', 'user_id', 'regency_id');
	}

	public function role()
	{
		return $this->belongsTo('Role', 'role_id', 'id');
	}

	// public static function isAdmin(){
	// 	$user = User::find(Auth::user()->get()->id);
	// 	if($user->role_id == ROLE_ADMIN){
	// 		return true;
	// 	}
	// 	else if($user->role_id == ROLE_USER) {
	// 		return false;
	// 	}
	// 	return false;
	// }
	public static function getCurrentUser($id)
	{
		$user_id_current  = Auth::user()->get()->id;
			if($user_id_current == $id)
				return true;
		return false;
	}
    public function reports()
	{
		return $this->belongsToMany('Report', 'report_users', 'receiver_id', 'report_id');
	}

    public static function isAdmin()
    {
    	$roleId = Auth::user()->get()->role_id;
    	if ($roleId == ROLE_ADMIN) {
    		return ROLE_ADMIN;
    	}
    	if ($roleId == ROLE_USER) {
    		return ROLE_USER;
    	}
    	return null;
    }
    public static function getUserIdByAuth()
    {
    	$user = Auth::user()->get();
    	if ($user) {
    		return $user->id;
    	}
    	return null;
    }
	public static function checkPermission($id)
	{
		if(self::isAdmin() == ROLE_USER){
			$user_id_current  = Auth::user()->get()->id;
			if($user_id_current == $id)
				return true;
			return false;
		}
		return true;
	}

	
	public static function checkPermissionFunction($funId, $per_id = null)
	{
		// if ($per_id) {
		// 	$perId = $per_id;
		// }
		// else {
		// 	$perId = PERMISSION_1;
		// }
		// $userId = Auth::user()->get()->id;
		// $arrayDep = DepartmentFunction::where('function_id', $funId)->lists('dep_id');
		// $check = DepRegencyPerUser::where('user_id', $userId)
		// 	->where('permission_id', $perId)
		// 	->where('status', ASSIGN_STATUS_1)
		// 	->whereIn('dep_id', $arrayDep)->get();
		// if(count($check) > 0){
		// 	return true;
		// }
		// return false;
	}

	public static function checkUserIsAdmin($id)
	{
		$user = User::find($id);
		if($user->role_id == ROLE_ADMIN)
			return true;
		return false;
	}

	public static function editFunctionUser()
	{
		$normal = Config::get('button.edit_normal');
		$advandce = Config::get('button.edit_advandce');
		$checkNormal = Common::checkPermissionUser(FUNCTION_USER, $normal);
		$checkAdvandce = Common::checkPermissionUser(FUNCTION_USER, $advandce);
		if (User::isAdmin() == ROLE_ADMIN || $checkNormal || $checkAdvandce) {
			return true;
		}
		return false;
	}
	public static function editFunctionUserAd()
	{
		$advandce = Config::get('button.edit_advandce');
		$checkAdvandce = Common::checkPermissionUser(FUNCTION_USER, $advandce);
		if (User::isAdmin() == ROLE_ADMIN || $checkAdvandce) {
			return true;
		}
		return false;
	}	
	public static function editPersonal($userId)
	{
		$check = self::editFunctionUserAd();
		$id = self::getUserIdByAuth();
		if ($id == $userId || $check) {
			return true;
		}
		return false;
	}
	public static function getDisabled($check)
	{
		if ($check == true) {
			return;
		}
		if ($check == false) {
			return 'disabled';
		}
	}
}

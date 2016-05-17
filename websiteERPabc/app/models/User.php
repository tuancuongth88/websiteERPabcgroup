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
	protected $fillable = array('email', 'password', 'username', 'name' , 'phone', 'address', 'avatar', 'fullname', 'dep_id', 'regency_id', 'status', 'date_of_birth', 'sex', 'ethnic', 'identity_card', 'current_address', 'personal_file', 'medical_file', 'curriculum_vitae_file', 'degree', 'skyper', 'number_tax', 'number_insure', 'marriage', 'note', 'type_id', 'salary', 'start_time', 'end_time', 'role_id');
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

<<<<<<< HEAD
	public static function isAdmin(){
		$user = User::find(Auth::user()->get()->id);
		if($user->role_id == ROLE_ADMIN){
			return true;
		}
		else if($user->role_id == ROLE_USER) {
			return false;
		}
		return false;
	}
	public static function getCurrentUser($id)
	{
		$user_id_current  = Auth::user()->get()->id;
			if($user_id_current == $id)
				return true;
		return false;
	}
=======
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
>>>>>>> 2e9824693c40ce0a7caa1745bd50b30734433588
	public static function checkPermission($id)
	{
		if(!User::isAdmin()){
			$user_id_current  = Auth::user()->get()->id;
			if($user_id_current == $id)
				return true;
			return false;
		}
		return true;
	}
	public static function checkRoleFunction($id, $model= null)
	{
			$listDepartment_ID = DepRegencyPerUser::where('user_id', $id)->lists('dep_id');
			$listFunction_id = DepartmentFunction::whereIn('dep_id', $listDepartment_ID)->lists('function_id');
			$listFunction = AdminFunction::whereIn('id', $listFunction_id)->get();
			$function_array = array();
			foreach ($listFunction as $key => $value) {
				// if($value->id == QUANLYHOSOCANHAN)
					$function_array = 	['name' => $value->name] + ['id' => $value->id];
			}
			return $function_array;
	}
	public static function getRoleUser($id, $model= null)
	{
		if(self::isAdmin())
			return USER_ADMIN;
		if(checkRoleFunction()) 

		if(self::getCurrentUser($id))
			return USER_PROFILE;
		else 
			return USER_ORTHER;
	}
}

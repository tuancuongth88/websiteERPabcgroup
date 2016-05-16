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
		if(!Admin::isAdmin()){
			$user_id_current  = Auth::user()->get()->id;
			if($user_id_current == $id)
				return true;
			return false;
		}
		return true;
	}
}

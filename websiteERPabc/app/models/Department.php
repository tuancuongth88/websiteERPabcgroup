<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Department extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departments';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'status', 'parent_id');
    protected $dates = ['deleted_at'];
    
 	public function adminfunctions()
    {
        return $this->belongsToMany('AdminFunction', 'department_function', 'dep_id', 'function_id');
    }
    public function users()
    {
        return $this->belongsToMany('User', 'dep_regency_per_user', 'dep_id', 'user_id');
    }
}

<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;


class DepartmentFunction extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'department_function';

	/** 
	 * The attributes excluded from the model's JSON form. 
	 *
	 * @var array 
	 */
	protected $fillable = array('dep_id', 'function_id');

}

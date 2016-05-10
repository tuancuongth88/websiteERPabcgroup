<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;


class DepRegencyPerFun extends Eloquent {
	use SoftDeletingTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dep_regency_per_funs';

	/** 
	 * The attributes excluded from the model's JSON form. 
	 *
	 * @var array 
	 */
	protected $fillable = array('dep_id', 'regency_id', 'permission_id', 'function_id');
	protected $dates = ['deleted_at'];
		 
}
  
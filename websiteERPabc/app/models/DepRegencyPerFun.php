<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;


class DepRegencyPerFun extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dep_regency_per_user';

	/** 
	 * The attributes excluded from the model's JSON form. 
	 *
	 * @var array 
	 */
	protected $fillable = array('dep_id', 'regency_id', 'permission_id', 'status', 'user_id');

}

<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;


class FunButtonUser extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'fun_button_user';

	/** 
	 * The attributes excluded from the model's JSON form. 
	 *
	 * @var array 
	 */
	protected $fillable = array('user_id', 'button_id', 'fun_id', 'status');
		 
}
  
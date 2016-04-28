<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;


class DepFunction extends Eloquent {
	use SoftDeletingTrait;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'dep_functions';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array 
	 */
	protected $fillable = array('dep_id', 'fun_id', 'user_id', 'per_id');
    protected $dates = ['deleted_at'];
   
}
  
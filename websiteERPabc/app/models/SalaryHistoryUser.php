<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class SalaryHistoryUser extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'salary_history';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('salaryId', 'user_update',  'model_name' , 'model_id' ,'status', 'start_date', 'note_user_update', 'salary_odl', 'salary_new', 'not_update', 'persend', 'upprove_id');
    protected $dates = ['deleted_at'];

   
}

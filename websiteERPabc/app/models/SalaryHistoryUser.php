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
	protected $fillable = array('salary_id', 'user_proposal', 'model_name', 'model_id',
		'status', 'start_date', 'note_user_update', 'salary_old', 'salary_new', 
		'note_reject', 'percent', 'approve_id', 'approve_date', 'type');
    protected $dates = ['deleted_at'];

   
}

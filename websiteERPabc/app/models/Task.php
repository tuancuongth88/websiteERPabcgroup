<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Task extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tasks';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'project_id', 'status', 'start', 'end',
		'description', 'percent', 'user_id', 'file_attach', 'task_status_id', 'parent_id');
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany('User', 'task_users', 'task_id', 'assign_id');
    }
}

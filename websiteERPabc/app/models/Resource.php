<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Resouce extends Eloquent {

	use UserTrait, RemindableTrait;
	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'resources';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('name','linkFile','link' ,'status');
    protected $dates = ['deleted_at'];

   
}

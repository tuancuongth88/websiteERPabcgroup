<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Resource extends Eloquent {

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

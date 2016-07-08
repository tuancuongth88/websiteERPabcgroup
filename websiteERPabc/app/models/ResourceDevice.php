<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ResourceDevice extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'resource_devices';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('name');
    protected $dates = ['deleted_at'];

   
}

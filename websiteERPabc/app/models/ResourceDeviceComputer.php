<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ResourceDeviceComputer extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'resource_device_computer';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'cpu', 'ram', 'hhd', 'provider', 'provider_contact', 'size', 'type', 'status', 'number', 'description');
    protected $dates = ['deleted_at'];

   
}

<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ResourceOffice extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'resource_office';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'provider', 'provider_contact', 'type', 'status', 'number', 'description');
    protected $dates = ['deleted_at'];

   
}

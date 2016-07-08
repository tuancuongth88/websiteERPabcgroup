<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ResourceDomain extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'resource_domains';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'username', 'password', 'url_login', 'start_date', 'end_date', 'provider', 'provider_contact', 'status');
    protected $dates = ['deleted_at'];

   
}

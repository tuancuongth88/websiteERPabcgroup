<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ResourceDocument extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'resource_documents';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'code', 'type', 'date_receive', 'date_send', 'date_promulgate', 'date_active', 'description', 'file', 'comment', 'status');
    protected $dates = ['deleted_at'];

   
}

<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Contract extends Eloquent {

	use SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'contracts';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $fillable = array('name', 'code', 'type', 'date_receive', 'date_send', 'date_promulgate', 'date_active', 'description', 'file', 'partner_id', 'result', 'comment', 'status', 'price', 'type_extend');
    protected $dates = ['deleted_at'];

   
}

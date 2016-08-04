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
	protected $fillable = array('name', 'code', 'type', 'date_sign', 'date_expired_new', 'date_expired_old', 'date_active', 'description', 'file', 'partner_id', 'result', 'comment', 'status', 'price', 'type_extend', 'parent_id', 'contract_addendum');
    protected $dates = ['deleted_at'];

   
}

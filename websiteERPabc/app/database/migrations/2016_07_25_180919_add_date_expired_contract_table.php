<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateExpiredContractTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contracts', function(Blueprint $table) {
			$table->string('date_expired_new', 250)->after('date_active')->nullable();
			$table->string('date_expired_old', 250)->after('date_active')->nullable();
			$table->dropColumn(array('date_promulgate', 'date_expired'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}

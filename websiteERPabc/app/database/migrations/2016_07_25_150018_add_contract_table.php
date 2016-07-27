<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContractTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contracts', function(Blueprint $table) {
			$table->string('date_sign', 250)->after('type')->nullable();
			$table->string('date_expired', 250)->after('date_active')->nullable();
			$table->dropColumn(array('date_receive', 'date_send'));
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatePartnerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('partners', function(Blueprint $table) {
			$table->integer('parent_id')->after('phone')->nullable();
			$table->string('regency', 250)->after('phone')->nullable();
			$table->string('department', 250)->after('phone')->nullable();
			$table->integer('type')->after('phone')->nullable();
			$table->dropColumn(array('comment', 'status'));
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

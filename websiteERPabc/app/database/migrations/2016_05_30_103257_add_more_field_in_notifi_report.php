<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFieldInNotifiReport extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('notifications', function(Blueprint $table) {
			$table->string('link_url', 256)->after('id')->nullable();
		});
		Schema::table('reports', function(Blueprint $table) {
			$table->string('link_url', 256)->after('id')->nullable();
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

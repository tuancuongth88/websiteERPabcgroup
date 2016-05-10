<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFileProfileUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->string('date_of_birth', 255)->after('fullname')->nullable();
			$table->integer('sex')->after('fullname')->nullable();
			$table->string('ethnic', 255)->after('fullname')->nullable();
			$table->string('identity_card', 255)->after('fullname')->nullable();
			$table->string('current_address', 500)->after('fullname')->nullable();
			$table->string('personal_file', 255)->after('fullname')->nullable();
			$table->string('medical_file', 255)->after('fullname')->nullable();
			$table->string('curriculum_vitae_file', 255)->after('fullname')->nullable();
			$table->string('degree', 255)->after('fullname')->nullable();
			$table->string('skyper', 255)->after('fullname')->nullable();
			$table->string('number_tax', 255)->after('fullname')->nullable();
			$table->string('number_insure', 255)->after('fullname')->nullable();
			$table->integer('marriage')->after('fullname')->nullable();
			$table->string('note', 500)->after('fullname')->nullable();
			$table->integer('type_id')->after('fullname')->nullable();
			$table->string('salary', 255)->after('fullname')->nullable();
			$table->string('start_time', 255)->after('fullname')->nullable();
			$table->string('end_time', 255)->after('fullname')->nullable();
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

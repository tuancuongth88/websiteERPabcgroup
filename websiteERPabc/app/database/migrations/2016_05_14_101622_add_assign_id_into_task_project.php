<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssignIdIntoTaskProject extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('task_users', function(Blueprint $table) {
            $table->integer('assign_id')->after('id')->nullable();
            $table->integer('status')->after('id')->nullable();
        });
        Schema::table('project_users', function(Blueprint $table) {
            $table->integer('assign_id')->after('id')->nullable();
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

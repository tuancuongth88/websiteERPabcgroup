<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salary_history', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('salaryId', 256)->nullable();
            $table->string('user_update', 256)->nullable();
            $table->string('model_name', 256)->nullable();
            $table->integer('model_id')->nullable();
            $table->string('start_date', 256)->nullable();
            $table->string('note_user_update', 256)->nullable();
            $table->string('salary_odl', 256)->nullable();
            $table->string('salary_new', 256)->nullable();
            $table->string('not_update', 256)->nullable();
            $table->integer('persend')->nullable();
            $table->integer('upprove_id')->nullable();
            $table->integer('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('salary_history');
	}

}

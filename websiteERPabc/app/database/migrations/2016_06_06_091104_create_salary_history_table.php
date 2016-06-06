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
            $table->integer('salary_id')->nullable();
            $table->string('user_proposal', 256)->nullable();
            $table->string('model_name', 256)->nullable();
            $table->integer('model_id')->nullable();
            $table->string('start_date', 256)->nullable();
            $table->string('note_user_update', 256)->nullable();
            $table->string('salary_old', 256)->nullable();
            $table->string('salary_new', 256)->nullable();
            $table->string('note_reject', 256)->nullable();
            $table->string('approve_date', 256)->nullable();
            $table->integer('percent')->nullable();
            $table->integer('approve_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('type')->nullable();
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

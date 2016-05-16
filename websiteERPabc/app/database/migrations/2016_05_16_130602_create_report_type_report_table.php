<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTypeReportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('report_type_reports', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('type_report_id')->nullable();
            $table->integer('report_id')->nullable();
            $table->integer('user_id')->nullable();
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
		Schema::drop('report_type_reports');
	}

}

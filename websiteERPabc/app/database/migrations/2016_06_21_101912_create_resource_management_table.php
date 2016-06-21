<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceManagementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resource_management', function(Blueprint $table) {
            $table->increments('id');
            $table->string('file_name', 256)->nullable();
            $table->string('description', 256)->nullable();
            $table->string('link_file', 256)->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('typer_id')->nullable();
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
		Schema::drop('resource_management');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceOfficeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('resource_office', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256);
            $table->string('provider', 256);
            $table->text('provider_contact');
            $table->integer('type');
            $table->integer('status');
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
		Schema::drop('resource_office');
	}

}

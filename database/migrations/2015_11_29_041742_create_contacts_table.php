<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('org_name_en');
			$table->string('org_name_sw');
			$table->string('physical_en');
			$table->string('physical_sw');
			$table->string('box_no_en');
			$table->string('box_no_sw');
			$table->string('phone_no');
			$table->string('email');
			$table->string('fax');
			$table->string('region');
			$table->integer('user_id')->unsigned();
			$table->boolean('is_published')->default(0);
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
		Schema::drop('contacts');
	}

}

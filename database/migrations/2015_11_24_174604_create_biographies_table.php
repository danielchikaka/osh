<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiographiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('biographies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('fullname');
			$table->string('title_en');
			$table->string('title_sw');
			$table->text('slug');
			$table->text('content_en');
			$table->text('content_sw');
			$table->string('photo_url');
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
		Schema::drop('biographies');
	}

}

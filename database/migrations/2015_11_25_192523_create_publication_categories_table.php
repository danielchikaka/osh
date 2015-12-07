<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('publication_categories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title_en');
			$table->string('title_sw');
			$table->integer('user_id')->unsigned();
			$table->boolean('is_published')->default(0);
			$table->string('slug');
			$table->string('url');
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
		Schema::drop('publication_categories');
	}

}

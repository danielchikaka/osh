<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title_en');
			$table->string('title_sw');
			$table->integer('category_id');
			$table->string('author');
			$table->string('url');
			$table->date('publishing_date');
			$table->date('expiry_date');
			$table->text('summary_en');
			$table->text('summary_sw');
			$table->text('content_en');
			$table->text('content_sw');		
			$table->integer('hits');
			$table->boolean('is_published')->default(0);
			$table->integer('user_id')->unsigned();
			$table->string('slug')->nullable();
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
		Schema::drop('pages');
	}

}

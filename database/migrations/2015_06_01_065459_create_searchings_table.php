<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('searchings', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('image');
			$table->timestamps();
		});
        Schema::create('challenge_searching', function(Blueprint $table)
        {
            $table->integer('challenge_id')->unsigned()->index();
            $table->integer('searching_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
            $table->foreign('searching_id')->references('id')->on('searchings')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('challenge_searching');
		Schema::drop('searchings');
	}

}

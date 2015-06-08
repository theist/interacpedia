<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('universities', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
			$table->timestamps();
		});
        Schema::create('challenge_university', function(Blueprint $table)
        {
            $table->integer('challenge_id')->unsigned()->index();
            $table->integer('university_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');
        });
        Schema::create('careers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('career_challenge', function(Blueprint $table)
        {
            $table->integer('challenge_id')->unsigned()->index();
            $table->integer('career_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
            $table->foreign('career_id')->references('id')->on('careers')->onDelete('cascade');
        });
        Schema::create('courses', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('challenge_course', function(Blueprint $table)
        {
            $table->integer('challenge_id')->unsigned()->index();
            $table->integer('course_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('challenge_university');
        Schema::drop('universities');
        Schema::drop('career_challenge');
        Schema::drop('careers');
        Schema::drop('challenge_course');
        Schema::drop('courses');
	}

}

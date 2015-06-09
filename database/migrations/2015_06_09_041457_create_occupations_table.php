<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccupationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('occupations', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->enum('type',['student','employee','other']);
            $table->string('experience')->nullable();
            $table->integer('sector_id')->unsigned()->nullable();
            $table->integer('career_id')->unsigned()->nullable();
            $table->integer('company_id')->unsigned()->nullable();
            $table->integer('university_id')->unsigned()->nullable();
            $table->integer('position_id')->unsigned()->nullable();
            $table->integer('course_id')->unsigned()->nullable();
			$table->timestamps();

            $table->foreign('career_id')->references('id')->on('careers')->onDelete('set null');
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('set null');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('set null');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null');
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('occupations');
	}

}

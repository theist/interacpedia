<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCourseMentorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_mentor', function (Blueprint $table) {
            $table->timestamps();
            $table->integer('course_id')->nullable()->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->integer('mentor_id')->nullable()->unsigned();
            $table->foreign('mentor_id')->references('id')->on('mentors');
        });
        Schema::drop('challenge_mentor');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('course_mentor');
        Schema::create('challenge_mentor', function (Blueprint $table)
        {
            $table->timestamps();
        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('challenge_id')->nullable()->unsigned();
            $table->foreign('challenge_id')->references('id')->on('challenges');
            $table->integer('course_id')->nullable()->unsigned();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->timestamps();
        });
        Schema::create('team_user', function(Blueprint $table)
        {
            $table->integer('team_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('team_user');
        Schema::drop('teams');
    }
}

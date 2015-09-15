<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->nullable()->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->string('title');
            $table->text('team_description');
            $table->text('focus');
            $table->text('solution');
            $table->text('benefits');
            $table->text('validation');
            $table->text('analysis');
            $table->text('obstacles');
            $table->text('success');
            $table->text('activities');
            $table->text('resources');
            $table->text('social');
            $table->text('others');
            $table->text('sample');
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
        Schema::drop('plans');
    }
}

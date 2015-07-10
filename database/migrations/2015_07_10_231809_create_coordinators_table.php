<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('profile');
            $table->string('image');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::create('challenge_coordinator', function (Blueprint $table) {
            $table->integer('challenge_id')->unsigned()->index();
            $table->integer('coordinator_id')->unsigned()->index();
            $table->timestamps();
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
            $table->foreign('coordinator_id')->references('id')->on('coordinators')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('challenge_coordinator');
        Schema::drop('coordinators');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBriefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->nullable()->unsigned();
            $table->foreign('team_id')->references('id')->on('teams');
            $table->string('name');
            $table->text('problem');
            $table->text('solution');
            $table->text('benefits');
            $table->text('analysis');
            $table->text('obstacles');
            $table->text('success');
            $table->text('keys');
            $table->text('others');
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
        Schema::drop('briefs');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('type')->nullable();
            $table->text('message');
            $table->boolean('read')->default(false);
            $table->integer('model_id')->nullable();
            $table->string('model_type')->nullable();
            $table->timestamps();
        });
        Schema::table('stats', function (Blueprint $table) {
            $table->increments('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('notifications');
        Schema::table('stats', function (Blueprint $table) {
            $table->dropColumn('id');
        });

    }
}

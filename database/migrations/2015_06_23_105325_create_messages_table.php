<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('from_user')->unsigned()->nullable();
            $table->integer('to_user')->unsigned()->nullable();
            $table->text('content')->nullable();
            $table->boolean('read')->default(false);
            $table->timestamps();

            $table->foreign('from_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_user')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('comments', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('likes', function(Blueprint $table)
        {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::table('follows', function(Blueprint $table)
        {
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
        Schema::drop('messages');
        Schema::table('comments', function(Blueprint $table)
        {
            $table->dropForeign('comments_user_id_foreign');
        });
        Schema::table('likes', function(Blueprint $table)
        {
            $table->dropForeign('likes_user_id_foreign');
        });
        Schema::table('follows', function(Blueprint $table)
        {
            $table->dropForeign('follows_user_id_foreign');
        });
    }
}

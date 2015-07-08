<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToPartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->string('type')->after('name');
            $table->string('slogan')->after('name');
            $table->text('description')->nullable()->after('type');
            $table->text('logo')->nullable()->after('description');
            $table->string('location')->after('description');
            $table->string('sector')->after('location');
            $table->string('website')->after('sector');
            $table->string('origin')->after('website');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('slogan');
            $table->dropColumn('description');
            $table->dropColumn('logo');
            $table->dropColumn('location');
            $table->dropColumn('sector');
            $table->dropColumn('website');
            $table->dropColumn('origin');
        });
    }
}

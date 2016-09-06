<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShowtimetestType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showtimestest_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('showtimestest_id')->unsigned();
            $table->foreign('showtimestest_id')->references('id')->on('showtimestest');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types');
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
        Schema::drop('showtimetest-type');
    }
}

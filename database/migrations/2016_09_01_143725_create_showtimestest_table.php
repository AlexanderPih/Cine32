<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowtimestestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showtimestest', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('film_id')->unsigned();
            $table->integer('cinema_id')->unsigned();
            $table->string('screen1')->nullable()->default(null);
            $table->string('screen2')->nullable()->default(null);
            $table->string('screen3')->nullable()->default(null);
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
        Schema::drop('showtimestest');
    }
}

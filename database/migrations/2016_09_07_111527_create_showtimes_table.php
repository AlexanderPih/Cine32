<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowtimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('showtimes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('film_id')->unsigned();
            $table->integer('cinema_id')->unsigned();
            $table->string('screenone_id')->nullable()->default(null);
            $table->string('screentwo_id')->nullable()->default(null);
            $table->string('screenthree_id')->nullable()->default(null);
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
        Schema::drop('showtimes');
    }
}

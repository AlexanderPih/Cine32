<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCinemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('address');
            $table->string('phone1')->nullable()->default(null);
            $table->string('phone2')->nullable()->default(null);
            $table->string('email');
            $table->integer('screens');
            $table->string('photo');
            $table->float('lat', 10,6);
            $table->float('lng', 10,6);
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
        Schema::drop('cinemas');
    }
}

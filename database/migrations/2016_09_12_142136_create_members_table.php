<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('firstname');
            $table->string('address');
            $table->string('city');
            $table->integer('postal');
            $table->integer('phone');
            $table->string('email');
            $table->string('profession');
            $table->date('birthday')->nullable();
            $table->boolean('treatement')->default(null);
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
        Schema::drop('members');
    }
}

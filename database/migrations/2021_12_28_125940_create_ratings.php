<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('id_sender')->unsigned();
            $table->integer('rating')->unsigned();
            $table->integer('id_reciever')->unsigned();
            $table->timestamps();

            $table->foreign('id_sender')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_reciever')->references('id')->on('craftsmen')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rates');
    }
}

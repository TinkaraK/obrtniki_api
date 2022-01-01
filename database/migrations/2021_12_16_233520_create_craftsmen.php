<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCraftsmen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::create('craftsmen', function (Blueprint $table) {
            $table->id();
            //$table->integer('user_id')->unsigned();
            $table->string('company_name');
            $table->string('address');
            $table->integer('post_number');
            $table->string('city');
            //$table->unsignedBigInteger('post_number')->unsigned();
            $table->string('phone_number');
            $table->string('tax_number');
           // $table->integer('trade_type')->unsigned();
            $table->longText('service_description');
            $table->longText('company_description');
            //$table->integer('region')->unsigned();
            //$table->integer('price_range')->unsigned();
            $table->foreignId("user_id");
            $table->foreignId("region_id");
            //$table->foreignId("post_number")->references("id")->on("post_numbers");
            $table->foreignId("trade_type_id");
            $table->foreignId("price_range_id");
            $table->timestamps();

            // $table->foreign('region')->references('id')->on('regions')->onUpdate('cascade')->onDelete('cascade');
           // $table->foreign('post_number')->references('id')->on('post_numbers')->onUpdate('cascade')->onDelete('cascade');
           // $table->foreign('trade_type')->references('id')->on('trade_types')->onUpdate('cascade')->onDelete('cascade');
           // $table->foreign('price_range')->references('id')->on('price_ranges')->onUpdate('cascade')->onDelete('cascade');
           // $table->foreign('user_id')->references('id')->on('users');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('craftsmans');
    }
}

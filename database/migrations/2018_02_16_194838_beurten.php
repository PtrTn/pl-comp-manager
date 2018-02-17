<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Beurten extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beurten', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lifter_id');
            $table->string('lift');
            $table->integer('beurtnummer');
            $table->string('gewicht')->nullable();
            $table->boolean('gehaald')->nullable();
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
        Schema::dropIfExists('beurten');
    }
}

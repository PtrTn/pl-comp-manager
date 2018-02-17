<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Lifters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lifters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lotnummer')->nullable();
            $table->string('naam', 128);
            $table->integer('leeftijd')->nullable();
            $table->string('gewichtsklasse')->nullable();
            $table->float('bodyweight')->nullable();
            $table->integer('rekHoogteSquat')->nullable();
            $table->integer('rekHoogteBench')->nullable();
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
        Schema::dropIfExists('lifters');
    }
}

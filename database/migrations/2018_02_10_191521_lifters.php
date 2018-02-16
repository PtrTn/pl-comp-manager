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
            $table->float('squat1')->nullable();
            $table->float('squat2')->nullable();
            $table->float('squat3')->nullable();
            $table->float('bench1')->nullable();
            $table->float('bench2')->nullable();
            $table->float('bench3')->nullable();
            $table->float('deadlift1')->nullable();
            $table->float('deadlift2')->nullable();
            $table->float('deadlift3')->nullable();
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

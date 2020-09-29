<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerSportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_sport', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('sport_id');
           
            
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_sport');
    }
}

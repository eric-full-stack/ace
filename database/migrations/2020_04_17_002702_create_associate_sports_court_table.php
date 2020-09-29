<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociateSportsCourtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associate_sports_court', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('associate_id');
            $table->unsignedBigInteger('sport_court_id');
            $table->boolean('professional')->default(false);
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            
            $table->foreign('sport_court_id')->references('id')->on('sports_courts')->onDelete('cascade');
            $table->foreign('associate_id')->references('id')->on('associates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('associate_sports_court');
    }
}

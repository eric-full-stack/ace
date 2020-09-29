<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('birth_date', 100)->nullable();
            $table->string('picture', 150)->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer("mmr")->unsigned()->default(1000);
            $table->integer("level")->unsigned()->default(1);
            $table->string("latitute")->nullable();
            $table->string("longitute")->nullable();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}

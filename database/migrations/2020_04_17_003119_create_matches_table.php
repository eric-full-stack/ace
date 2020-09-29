<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['casual', 'professional'])->default("casual");
            $table->unsignedBigInteger('associate_sports_court_id');
            $table->unsignedBigInteger("created_by");
            $table->unsignedBigInteger("ace");
            $table->unsignedBigInteger("ace_type");
            $table->boolean("private")->default(1);
            $table->datetime('schedule');

            $table->foreign('associate_sports_court_id')->references('id')->on('associate_sports_court')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('matches');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociatesGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associates_gallery', function (Blueprint $table) {
            $table->id();
            $table->string("picture", 100);
            $table->unsignedBigInteger('associate_id');
           
            $table->foreign('associate_id')->references('id')->on('associates')->onDelete('cascade');
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
        Schema::dropIfExists('associates_gallery');
    }
}

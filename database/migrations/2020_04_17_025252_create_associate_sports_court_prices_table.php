<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociateSportsCourtPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associate_sports_court_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('associate_sports_court_id');
            $table->time('hours', 0);
            $table->decimal('amount', 8, 2);

            $table->foreign('associate_sports_court_id')->references('id')->on('associate_sports_court')->onDelete('cascade');
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
        Schema::dropIfExists('associate_sports_court_prices');
    }
}

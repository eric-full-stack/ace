<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associates', function (Blueprint $table) {
            $table->id();
            $table->integer("reputation")->default(100);
            $table->string("cnpj", 25);
            $table->string("opening_time", 5);
            $table->string("closing_time", 5);
            $table->string("cpf", 20);
            $table->string("rg", 12);
            $table->string("emissor", 30);
            $table->string("bank", 30);
            $table->string("agency", 30);
            $table->string("account", 30);
            $table->unsignedBigInteger('user_id');
            
           
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('associates');
    }
}

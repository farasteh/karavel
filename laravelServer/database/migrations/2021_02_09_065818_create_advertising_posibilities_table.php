<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisingPosibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_posibilities', function (Blueprint $table) {
            $table->id();
            $table->integer('advertising')->unsigned();
            $table->foreign('advertising')->references('id')->on('advertisings')->onDelete('cascade');
            $table->bigInteger('possibility')->unsigned();
            $table->foreign('possibility')->references('id')->on('possibilities')->onDelete('cascade');
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
        Schema::dropIfExists('advertising_posibilities');
    }
}

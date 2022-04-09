<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdvertisingLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_languages', function (Blueprint $table) {
            $table->id();
            $table->integer('advertising')->unsigned();
            $table->foreign('advertising')->references('id')->on('advertisings')->onDelete('cascade');
            $table->bigInteger('language')->unsigned();
            $table->foreign('language')->references('id')->on('languages')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('advertising_languages');
    }
}

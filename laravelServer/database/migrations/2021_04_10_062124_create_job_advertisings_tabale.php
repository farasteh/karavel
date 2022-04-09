<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobAdvertisingsTabale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('job_advertisings', function (Blueprint $table) {
            $table->id();
            $table->integer('id_advertising')->unsigned();
            $table->foreign('id_advertising')->references('id')->on('advertisings')->onDelete('cascade');
            $table->integer('id_work_category')->unsigned();
            $table->foreign('id_work_category')->references('id')->on('category_works')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_advertisings_tabale');
    }
}

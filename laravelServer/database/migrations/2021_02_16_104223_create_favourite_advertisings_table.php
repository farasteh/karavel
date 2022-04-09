<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavouriteAdvertisingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourite_advertisings', function (Blueprint $table) {
            $table->id();
            $table->Integer('base_resume_id')->unsigned();
            $table->foreign('base_resume_id')->references('id')->on('base_resumes')->onDelete('cascade');
            $table->Integer('advertising_id')->unsigned();
            $table->foreign('advertising_id')->references('id')->on('advertisings')->onDelete('cascade');
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
        Schema::dropIfExists('favourite_advertisings');
    }
}

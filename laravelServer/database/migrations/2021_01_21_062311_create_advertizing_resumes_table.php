<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertizingResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertizing_resumes', function (Blueprint $table) {
            $table->id();
            $table->Integer('base_resume')->unsigned();
            $table->foreign('base_resume')->references('id')->on('base_resumes')->onDelete('cascade');
            $table->Integer('advertising')->unsigned();
            $table->foreign('advertising')->references('id')->on('advertisings')->onDelete('cascade');
            $table->string('file')->nullable();
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
        Schema::dropIfExists('advertizing_resumes');
    }
}

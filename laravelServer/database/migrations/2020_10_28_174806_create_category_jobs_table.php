<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_job')->unsigned();
            $table->foreign('id_job')->references('id')->on('jobs')->onDelete('cascade');
            $table->string('title');
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
        Schema::dropIfExists('category_jobs');
    }
}

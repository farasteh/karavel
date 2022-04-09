<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_resumes', function (Blueprint $table) {
            $table->id();
            $table->integer('base_resume')->unsigned();
            $table->foreign('base_resume')->references('id')->on('base_resumes')->onDelete('cascade');
            $table->integer('effect')->unsigned();
            $table->foreign('effect')->references('id')->on('effects');
            $table->string('title')->nullable();
            $table->string('publisher')->nullable();
            $table->string('link')->nullable();
            $table->longText('comment')->nullable();
            $table->string('date')->nullable();
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
        Schema::dropIfExists('article_resumes');
    }
}

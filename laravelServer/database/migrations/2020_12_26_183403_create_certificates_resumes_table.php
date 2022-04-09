<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates_resumes', function (Blueprint $table) {
            $table->id();
            $table->integer('base_resume')->unsigned();
            $table->foreign('base_resume')->references('id')->on('base_resumes')->onDelete('cascade');
            $table->string('certificate');
            $table->string('title')->nullable();
            $table->string('Institute')->nullable();
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
        Schema::dropIfExists('certificates_resumes');
    }
}

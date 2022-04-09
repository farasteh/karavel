<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_studies', function (Blueprint $table) {
            $table->id();
            $table->integer('base_resume')->unsigned();
            $table->foreign('base_resume')->references('id')->on('base_resumes')->onDelete('cascade');
            $table->integer('document')->nullable();
            $table->string('Field_Study')->nullable();
            $table->string('orientation')->nullable();
            $table->integer('institutes')->nullable();
            $table->string('title_institutes')->nullable();
            $table->string('average')->nullable();
            $table->integer('province')->nullable();
            $table->integer('city')->nullable();
            $table->integer('entering_year')->nullable();
            $table->integer('year_departure')->nullable();
            $table->boolean('Studying')->nullable();
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
        Schema::dropIfExists('record_studies');
    }
}

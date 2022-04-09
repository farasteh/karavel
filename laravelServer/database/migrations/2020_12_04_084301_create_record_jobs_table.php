<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('base_resume')->unsigned();
            $table->foreign('base_resume')->references('id')->on('base_resumes')->onDelete('cascade');
            $table->string('job_side')->nullable();
            $table->integer('job')->nullable();
            $table->integer('center_job')->nullable();
            $table->string('title_center_job')->nullable();
            $table->integer('cooperation_type')->nullable();
            $table->integer('group_levels')->nullable();
            $table->integer('province')->nullable();
            $table->integer('city')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->boolean('working')->nullable();
            $table->longText('comment')->nullable();
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
        Schema::dropIfExists('record_jobs');
    }
}

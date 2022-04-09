<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('base_resumes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();;
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('job')->nullable();
            $table->integer('category_job')->nullable();
            $table->integer('work_job')->nullable();
            $table->integer('gender')->nullable();
            $table->boolean('marital_status')->nullable();
            $table->integer('soldier')->nullable();
            $table->dateTimeTz('birth_date')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('site')->nullable();
            $table->integer('province')->nullable();
            $table->integer('city')->nullable();
            $table->longText('comment')->nullable();
            $table->longText('address')->nullable();
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
        Schema::dropIfExists('base_resumes');
    }
}

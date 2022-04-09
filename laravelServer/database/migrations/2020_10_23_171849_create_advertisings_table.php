<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs');
            $table->integer('category_id')->unsigned();
            $table->integer('work_category_id')->unsigned();
            $table->integer('province')->nullable();
            $table->integer('city')->nullable();
            $table->integer('CooperationType')->nullable();
            $table->integer('money')->nullable();
            $table->integer('HistoryJop')->nullable();
            $table->integer('document')->nullable();
            $table->string('FildStudy')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('Soldier')->nullable();
            $table->string('TimeUp')->nullable();
            $table->string('TimeDown')->nullable();
            $table->longText('comment')->nullable();
            $table->longText('possibilities')->nullable();
            $table->enum('is_show', ['', 'yes','no'])->default('');
            $table->longText('is_show_comment')->nullable();

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
        Schema::dropIfExists('advertisings');
    }
}

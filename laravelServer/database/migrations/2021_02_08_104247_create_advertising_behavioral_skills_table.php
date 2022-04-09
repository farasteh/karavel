<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisingBehavioralSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_behavioral_skills', function (Blueprint $table) {
            $table->id();
            $table->integer('advertising')->unsigned();
            $table->foreign('advertising')->references('id')->on('advertisings')->onDelete('cascade');
            $table->bigInteger('behavioral_skill')->unsigned();
            $table->foreign('behavioral_skill')->references('id')->on('behavioral_skills')->onDelete('cascade');
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
        Schema::dropIfExists('advertising_behavioral_skills');
    }
}

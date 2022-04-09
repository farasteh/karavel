<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBaseresumerecordStudiesColumnToRecordStudy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects_resumes', function (Blueprint $table) {
            $table->integer('base_resume')->unsigned();
            $table->foreign('base_resume')->references('id')->on('base_resumes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects_resumes', function (Blueprint $table) {
            $table->dropColumn('base_resume');
        });
    }
}

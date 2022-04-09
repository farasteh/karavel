<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToResumeAdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertizing_resumes', function (Blueprint $table) {
            $table->bigInteger('status')->nullable()->default(1)->unsigned();
            $table->foreign('status')->references('id')->on('resume_statuses')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertizing_resumes', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}

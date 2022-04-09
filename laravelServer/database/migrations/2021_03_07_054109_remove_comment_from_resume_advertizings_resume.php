<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCommentFromResumeAdvertizingsResume extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertizing_resumes', function (Blueprint $table) {
            $table->dropColumn('comment');
            $table->dropColumn('Companycomment');
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
            $table->text('comment')->nullable();
            $table->text('Companycomment')->nullable();
        });
    }
}

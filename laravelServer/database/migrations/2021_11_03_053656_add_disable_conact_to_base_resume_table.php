<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDisableConactToBaseResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('base_resumes', function (Blueprint $table) {
            $table->tinyInteger('disable_contact')->after('address')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('base_resume', function (Blueprint $table) {
            $table->dropColumn('disable_contact');
        });
    }
}

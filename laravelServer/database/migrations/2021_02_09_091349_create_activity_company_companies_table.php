<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityCompanyCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_company_companies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('activity_company')->unsigned();
            $table->foreign('activity_company')->references('id')->on('activity_companies')->onDelete('cascade');
            $table->bigInteger('company')->unsigned();
            $table->foreign('company')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::dropIfExists('activity_company_companies');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiSafetiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_safeties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps('Sf_Date');
            $table->string('Sf_Enid');
            $table->string('Sf_Name');
            $table->string('Sf_TypeSafetie');
            $table->string('Sf_Remark');
            $table->string('Sf_User');
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
        Schema::dropIfExists('kpi_safeties');
    }
}

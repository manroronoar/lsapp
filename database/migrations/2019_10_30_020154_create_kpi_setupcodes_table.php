<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiSetupcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_setupcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Sc_Number');
            $table->string('Sc_Name');
            $table->string('Sc_Remark');
            $table->boolean('Sc_Status');
            $table->string('Sc_User');
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
        Schema::dropIfExists('kpi_setupcodes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiDowncodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_downcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Dc_Number');
            $table->string('Dc_Type');
            $table->string('Dc_Name');
            $table->string('Dc_Remark');
            $table->boolean('Dc_Status');
            $table->string('Dc_User');
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
        Schema::dropIfExists('kpi_downcodes');
    }
}

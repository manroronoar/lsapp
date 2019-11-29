<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_shifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Sh_Name');
            $table->string('Sh_Type');
            $table->time('Sh_Timestart');
            $table->time('Sh_Timestop');
            $table->boolean('Sh_Status');
            $table->string('Sh_User');
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
        Schema::dropIfExists('kpi_shifts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiReportKpisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_report_kpis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Re_McNumber');
            $table->decimal('Re_TotalAr');
            $table->decimal('Re_QtyOee');
            $table->decimal('Re_CountOee');
            $table->integer('Re_OutPut');
            $table->integer('Re_CountBit1');
            $table->integer('Re_CountBit2');
            $table->integer('Re_CountBit3');
            $table->integer('Re_CountBit4');
            $table->integer('Re_CountBit5');
            $table->integer('Re_CountBit6');
            $table->integer('Re_CountBit7');
            $table->integer('Re_CountBit8');
            $table->dateTime('Re_CalByHs');
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
        Schema::dropIfExists('kpi_report_kpis');
    }
}

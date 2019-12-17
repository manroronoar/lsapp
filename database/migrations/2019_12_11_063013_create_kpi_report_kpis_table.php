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
            $table->decimal('Re_Ar_Target');
            $table->decimal('Re_Ar_Actual');
            $table->decimal('Re_Pr_Target');
            $table->decimal('Re_Pr_Actual');
            $table->decimal('Re_Qr_Target');
            $table->decimal('Re_Qr_Actual');
            $table->decimal('Re_Oee_Target'); 
            $table->decimal('Re_Oee_Actual');         
            $table->integer('Re_Count_Bit1');
            $table->integer('Re_Sum_Sec_Bit1');
            $table->integer('Re_Count_Bit2');
            $table->integer('Re_Sum_Sec_Bit2');
            $table->integer('Re_Count_Bit3');
            $table->integer('Re_Sum_Sec_Bit3');
            $table->integer('Re_Count_Bit4');
            $table->integer('Re_Sum_Sec_Bit4');
            $table->integer('Re_Count_Bit5');
            $table->integer('Re_Sum_Sec_Bit5');
            $table->integer('Re_Count_Bit6');
            $table->integer('Re_Sum_Sec_Bit6');
            $table->integer('Re_Count_Bit7');
            $table->integer('Re_Sum_Sec_Bit7');
            $table->integer('Re_Count_Bit8');
            $table->integer('Re_Sum_Sec_Bit8');
            $table->string('Re_Shift');
            $table->dateTime('Re_Hs_S');
            $table->dateTime('Re_Hs_E');
            $table->dateTime('Re_Cal_By_Hs');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiHeadersetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_headersets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Hs_Mc');
            $table->integer('Hs_TargetHour');
            $table->string('Hs_Drawing');
            $table->string('Hs_Shift');
            $table->string('Hs_Employee');
            $table->string('Hs_Customer');
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
        Schema::dropIfExists('kpi_headersets');
    }
}

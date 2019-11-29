<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiMcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_mcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Mc_Number');
            $table->string('Mc_Node');
            $table->string('Mc_Name');
            $table->string('Mc_Type');
            $table->string('Mc_Brand');
            $table->string('Mc_Location');
            $table->string('Mc_User');
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
        Schema::dropIfExists('kpi_mcs');
    }
}

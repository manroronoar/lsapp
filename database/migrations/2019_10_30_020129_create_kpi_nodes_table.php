<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_nodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nd_Number');
            $table->string('Nd_Name');
            $table->string('Nd_Detail');
            $table->boolean('Nd_Status');
            $table->string('Nd_User');
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
        Schema::dropIfExists('kpi_nodes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiSetqualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_setqualities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Sq_Mc');
            $table->decimal('Sq_Fixqualitie');
            $table->string('Sq_User');
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
        Schema::dropIfExists('kpi_setqualities');
    }
}

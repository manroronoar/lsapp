<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiCustcomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_custcoms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Cc_Mcnumber');
            $table->string('Cc_Namecust');
            $table->string('Cc_Type');
            $table->string('Cc_Remark');
            $table->string('Cc_User');
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
        Schema::dropIfExists('kpi_custcoms');
    }
}

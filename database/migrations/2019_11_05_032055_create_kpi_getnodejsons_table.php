<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiGetnodejsonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //_id: "5dbbfc5a8df4c1397adf3f11",
    //astid: "",
    //iobit: "01100000",
    //ts: 1572626122,
    //dmystr: "01/11/2019",
    //hmstr: "16:35:22",
    //sec: 2,
    //tsupd: 1572626124
    public function up()
    {
        Schema::create('kpi_getnodejsons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Gn_id');
            $table->string('Gn_node');
            $table->string('Gn_astid')->nullable();
            $table->string('Gn_iobit');
            $table->integer('Gn_posbit');
            $table->integer('Gn_ts');
            $table->string('Gn_downcode');
            $table->string('Gn_remark');
            $table->date('Gn_dmystr');
            $table->time('Gn_hmstr');
            $table->integer('Gn_sec');
            $table->integer('Gn_tsupd');
            
            $table->string('Gn_enoper1');
            $table->string('Gn_enoper2');
            $table->string('Gn_enpm1');
            $table->string('Gn_enpm2');
            $table->string('Gn_enpm1oth1');
            $table->string('Gn_enpm1oth2');
            $table->decimal('Gn_fixqualitie');

            $table->string('Gn_hsidrawing');
            $table->string('Gn_hsimc');
            $table->string('Gn_hsitargetHour');

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
        Schema::dropIfExists('kpi_getnodejsons');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpiBittypedownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kpi_bittypedowns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Bi_Bit');
            $table->string('Bi_Type');
            $table->string('Bi_User');
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
        Schema::dropIfExists('kpi_bittypedowns');
    }
}

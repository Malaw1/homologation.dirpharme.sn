<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('substances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('substance');
            $table->string('dosage');
            $table->string('unite');
            $table->unsignedBigInteger('enreg_id');
            $table->foreign('enreg_id')->references('id')->on('enregistrements');
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
        Schema::dropIfExists('substances');
    }
}

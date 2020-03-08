<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVExpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_exps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('structure');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('description');
            $table->unsignedBigInteger('visiteur_id');
            $table->foreign('visiteur_id')->references('id')->on('visiteurs');
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
        Schema::dropIfExists('v_exps');
    }
}

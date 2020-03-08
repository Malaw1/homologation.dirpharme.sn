<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecevabilitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recevabilites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deadline');
            $table->text('commentaire');
            $table->unsignedBigInteger('enreg_id');
            $table->foreign('enreg_id')->references('id')->on('enregistrements');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('recevabilites');
    }
}

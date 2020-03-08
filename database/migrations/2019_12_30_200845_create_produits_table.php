<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_medicament');
            $table->string('forme_pharmaceutique');
            $table->string('presentation');
            $table->string('classe_therapeutique');
            $table->string('pght');
            $table->string('indication');
            $table->text('excipient');
            $table->text('excipient_notoire')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('adresse')->nullable();
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
        Schema::dropIfExists('produits');
    }
}

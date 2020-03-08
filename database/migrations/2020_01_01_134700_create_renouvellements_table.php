<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenouvellementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renouvellements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_amm');
            $table->string('produit');
            $table->string('module_1');
            $table->string('module_2');
            $table->string('status');
            $table->unsignedBigInteger('labo_titulaire');
            $table->foreign('labo_titulaire')->references('id')->on('laboratoire');
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
        Schema::dropIfExists('renouvellements');
    }
}

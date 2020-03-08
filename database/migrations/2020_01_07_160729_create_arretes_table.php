<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArretesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arretes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('laboratoire');
            $table->string('filename');
            $table->string('produit');
            $table->string('type');
            $table->string('serie');
            $table->date('date');
            $table->string('numero_amm')->unique();
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
        Schema::dropIfExists('arretes');
    }
}

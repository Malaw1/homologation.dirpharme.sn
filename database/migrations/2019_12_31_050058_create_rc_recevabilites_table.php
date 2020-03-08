<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRcRecevabilitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rc_recevabilites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename');
            $table->text('commentaire');
            $table->unsignedBigInteger('recevabilite_id');
            $table->foreign('recevabilite_id')->references('id')->on('recevabilites');
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
        Schema::dropIfExists('rc_recevabilites');
    }
}

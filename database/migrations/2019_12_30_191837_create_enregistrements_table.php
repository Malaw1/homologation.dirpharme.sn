<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnregistrementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enregistrements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('numero');
            $table->string('paiement')->nullable();
            $table->string('status');
            $table->string('completude')->nullable();
            $table->string('completude_by')->nullable();
            $table->string('recevable')->nullable();
            $table->string('received_by')->nullable();
            $table->string('evaluation')->nullable();
            $table->string('evaluated_by')->nullable();
            $table->integer('commission_id')->nullable();
            $table->unsignedBigInteger('laboratoire')->nullable();
            $table->foreign('laboratoire')->references('id')->on('laboratoires');
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
        Schema::dropIfExists('enregistrements');
    }
}

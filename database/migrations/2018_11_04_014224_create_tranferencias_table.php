<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTranferenciasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranferencias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('valor');
            $table->string('comprobante');
            $table->integer('beneficiario')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('beneficiario')->references('id')->on('cuentas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tranferencias');
    }
}

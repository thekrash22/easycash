<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuentasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_beneficiaro');
            $table->integer('tipo_documento');
            $table->integer('ndocumento');
            $table->integer('entidad_bancaria');
            $table->integer('tcuenta');
            $table->string('ncuenta');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cuentas');
    }
}

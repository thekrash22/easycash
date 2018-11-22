<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAcountsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('beneficiary_name');
            $table->integer('documents_types_id')->unsigned();
            $table->string('documentnumber');
            $table->integer('banks_id')->unsigned();
            $table->integer('acounts_types_id')->unsigned();
            $table->string('acountnumber');
            $table->integer('users_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('documents_types_id')->references('id')->on('documents_types');
            $table->foreign('banks_id')->references('id')->on('banks');
            $table->foreign('acounts_types_id')->references('id')->on('acounts_types');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('acounts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('acounts_id')->unsigned();
            $table->integer('currency_histories_id')->unsigned();
            $table->integer('statuses_id')->unsigned();
            $table->string('customervoucher');
            $table->string('systemvoucher');
            $table->string('amount');
            $table->string('net');
            $table->string('utility');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('acounts_id')->references('id')->on('acounts');
            $table->foreign('currency_histories_id')->references('id')->on('currency_histories');
            $table->foreign('statuses_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transactions');
    }
}

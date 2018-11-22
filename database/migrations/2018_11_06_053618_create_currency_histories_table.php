<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrencyHistoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currency_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('foreing_exchange_id')->unsigned();
            $table->double('price');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('foreing_exchange_id')->references('id')->on('foreing_exchanges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('currency_histories');
    }
}

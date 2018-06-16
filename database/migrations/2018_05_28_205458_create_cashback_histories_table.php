<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashbackHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashback_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('shop_id');
            $table->integer('card_id');
            $table->timestampTz('time');
            $table->decimal('sum');
            $table->decimal('cashback');
            $table->bigInteger('percent_id');
            $table->timestamps();
        });

        Schema::table('cashback_histories', function ($table) {
            $table->foreign('card_id')->references('id')->on('cards');
            $table->foreign('shop_id')->references('id')->on('shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cashback_history');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCashbackHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashback_history', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('shop_id');
            $table->integer('card_id');
            $table->timestampTz('time');
            $table->decimal('sum');
            $table->decimal('cashback');
            $table->timestamps();
        });

        Schema::table('cashback_history', function ($table) {
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

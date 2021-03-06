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
            $table->bigInteger('shop_id')->nullable();
            $table->bigInteger('client_id')->nullable();
            $table->bigInteger('percent_id');
            $table->decimal('sum');
            $table->decimal('cashback');
            $table->timestamps();
        });

        Schema::table('cashback_histories', function ($table) {
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('set null');
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

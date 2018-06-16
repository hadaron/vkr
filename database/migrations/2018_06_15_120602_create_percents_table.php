<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePercentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('percents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partner_id');
            $table->float('percent');
            $table->timestamps('3');
        });
        Schema::table('percents', function ($table) {
            $table->foreign('partner_id')->references('id')->on('partners');
        });
        Schema::table('cashback_histories', function ($table) {
            $table->foreign('percent_id')->references('id')->on('percents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('percent');
    }
}

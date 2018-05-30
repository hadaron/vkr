<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParntersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('full_name')->nullable();
            $table->char('inn', 12)->nullable();
            $table->char('kpp', 9)->nullable();
            $table->char('ogrn', 13)->nullable();
            $table->string('rc')->nullable();
            $table->string('bank_name')->nullable();
            $table->char('bik', 9)->nullable();
            $table->char('ks', 9)->nullable();
            $table->bigInteger('user_id');
            $table->timestamps();
        });
        Schema::table('partners', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');

    }
}

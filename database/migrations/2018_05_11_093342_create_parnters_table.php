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
            $table->char('phone_number', 11)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('name')->nullable();
            $table->string('full_name')->nullable();
            $table->char('inn', 12)->nullable();
            $table->char('kpp', 9)->nullable();
            $table->char('ogrn', 13)->nullable();
            $table->string('rc')->nullable();
            $table->string('bank_name')->nullable();
            $table->char('bik', 9)->nullable();
            $table->char('ks', 9)->nullable();
            $table->timestamps();
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

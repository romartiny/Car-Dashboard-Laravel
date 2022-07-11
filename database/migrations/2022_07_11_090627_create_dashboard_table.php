<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->string('model');
            $table->date('year');
        });

        Schema::create('showroom', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->string('color');
            $table->float('price');
            $table->string('sold');
            $table->date('date_of_sell');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dashboard');
    }
};

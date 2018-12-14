<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarReserves extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->int('cost');
            $table->timestamps('date');
            $table->timestamps('begin_date');
            $table->timestamps('end_date');
            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
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
        Schema::dropIfExists('car_reserves');
    }
}

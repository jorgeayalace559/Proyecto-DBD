<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceReserve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_reserves', function (Blueprint $table) {
            $table->increments('id');
            $table->int('cost');
            $table->timestamps('date');
            $table->timestamps('begin_date');
            $table->timestamps('end_date');
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders');
            $table->foreign('insurance_id')->references('id')->on('insurances');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_reserves');
    }
}
